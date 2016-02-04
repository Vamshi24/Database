import csv
import re
import sys
from collections import OrderedDict

def main():

	inp=str(sys.argv[1]).strip()
	inp2=inp.split("from")
	inp2[0] = inp2[0].strip()
	inp1=inp2[0].split(" ")
	inp2[1] = inp2[1].strip()
	inp3=inp2[1].split(" ")

	if inp1[0].lower() != "select":
		print "ERROR" + "This is not select"
		return

	if len(inp1) == 2:		
		colStr = inp1[1];
		colStr = (re.sub(' +',' ',colStr)).strip()
		columns = colStr.split(',');

	tableStr = inp3[0];
	tableStr = (re.sub(' +',' ',tableStr)).strip();
	tables = tableStr.split(',')

	columns1=[]
	tables1(columns1,tables)
	csv1=[]
	for i in range(0,len(tables)):
		csv1.append(tables[i].strip() + ".csv")

	if len(inp3) >1 and len(tables)==1:
		where(inp3[2:],columns,tables,columns1)
		return
	
	elif len(inp3)>1 and len(tables)>1:
		wherejoin(inp3[2:],columns,tables,columns1,csv1)
		return
	
	if len(tables) > 1:
		join(tables,csv1,columns,columns1)
		return

	if len(inp1) == 3:
		colStr = inp1[2];
		colStr = (re.sub(' +',' ',colStr)).strip()
		columns = colStr.split(',');
		dis = inp1[1];
		dis = (re.sub(' +',' ',colStr)).strip()
		if dis.lower() == 'distinct':
			distinct(lis,tables,colu)

	if len(columns) == 1 and columns[0] == '*':
		for t in tables:
			for c in columns1:
				print t + "." + c,
			print
		
		for t in range(0,len(csv1)):
			with open(csv1[t]) as f:
				reader = csv.reader(f)
				for row in reader:
					for col in columns1:
						print row[columns1.index(col)],
					print

	elif len(columns) >=1 and '(' not in columns[0] and ')' not in columns[0]:	
		values(columns,csv1,columns1,tables)

	elif len(columns) == 1 and '(' in columns[0] and ')' in columns[0]:
		function = ""
		colu = ""
		lis=[]
		a1 = columns[0].split('(');
		function = (re.sub(' +',' ',a1[0])).strip()
		k = a1[1].split(')')
		colu = (re.sub(' +',' ',k[0])).strip()
		for t in range(0,len(csv1)):
			with open(csv1[t]) as f:
				reader = csv.reader(f)
				for row in reader:
					for col in colu:
						lis.append(int(row[columns1.index(col)].strip()))

		if function.lower() == 'max':
			print "max =" + str(max(lis))
		
		elif function.lower() == 'min':
			print "min =" + str(min(lis))
		
		elif function.lower() == 'sum':
			print "sum =" + str(sum(lis))
		
		elif function.lower() == 'avg':
			print "avg =" + str(sum(lis)/len(lis))
		
		elif function.lower() == 'distinct':
			distinct(lis,tables,colu)

		else:
			print "Required Function Not Found"

def where(cond,columns,tables,columns1):

	if len(columns) == 1 and columns[0] == '*':
		columns = columns1
	
	f = open(tables[0] + '.csv','rb');
	reader = csv.reader(f)

	for i in columns:
		print tables[0] + '.' + i,
	print
	
	for r in reader:
		st = ""
		for i in cond:
			if i == '=':
				st += '=='
			elif i in columns1:
				st += r[columns1.index(i)]
			elif i.lower() == 'and' or i.lower() == 'or':
				st += ' ' + i.lower() + ' '
			else:
				st += i
		if eval(st):
			for j in range(0,len(columns)):
					print r[columns1.index(columns[j])],
			print	

def wherejoin(cond,columns,tables,columns1,csv1):
	if len(columns) == 1 and columns[0] == '*':
		columns = columns1
	tables.reverse()
	csv1.reverse()
	f1 = open(csv1[0],"rb")
	f2 = open(csv1[1],"rb")
	reader1 = csv.reader(f1)
	reader2 = csv.reader(f2)
	l=[]
	for row1 in reader1:
		for row2 in reader2:
			l.append(row2 + row1)
		f2.seek(0)

	for i in columns:
		print i,
	print
	
	for r in l:
		st = ""
		for i in cond:
			if i == '=':
				st += '=='
			elif i in columns1:
				st += r[columns1.index(i)]
			elif i.lower() == 'and' or i.lower() == 'or':
				st += ' ' + i.lower() + ' '
			else:
				st += i
		if eval(st):
			for j in range(0,len(columns)):
					print r[columns1.index(columns[j])],
			print	

def tables1(columns1,tables):
	with open("./metadata.txt") as read:
		for line in read:
			for z in range(0,len(tables)):
				if line.strip() == tables[z]:
					for line1 in read:
						if line1.strip() == "<end_table>":
							break;
						columns1.append(line1.strip())
				else:
					print "ERROR"
					return 

def values(columns,csv1,columns1,tables):
	for i in range(0,len(csv1)):
		with open(csv1[i]) as f:
			reader = csv.reader(f)
			for t in tables:
					for c in columns:
						print t + "." + c,
					print
			for row in f:
				row = (re.sub(' +',' ',row)).strip()
				row1 = row.split(",")
				for j in range(0,len(columns)):
					print row1[columns1.index(columns[j])],
				print

def distinct(lis,tables,colu):
	l = [
	e
    for i, e in enumerate(lis)
    if lis.index(e) == i
 	]
 	for t in tables:
 		for c in colu:
 			print t + "." + c

	for i in range(0,len(l)):
		print l[i]

def join(tables,csv1,columns,columns1):

	for i in columns:
		print i,
	print

	tables.reverse()
	csv1.reverse()
	f1 = open(csv1[0],"rb")
	f2 = open(csv1[1],"rb")
	reader1 = csv.reader(f1)
	reader2 = csv.reader(f2)
	l=[]
	for row1 in reader1:
		for row2 in reader2:
			l.append(row2 + row1)
		f2.seek(0)
	if(len(columns) == 1 and columns[0] == '*'):
		for row in l:
			for i in range(0,len(columns1)):
				print row[i],
			print
	else:
		for row in l:
			for col in range(0,len(columns)):
				print row[columns1.index(columns[col])],
			print

if __name__ == '__main__':
	main()