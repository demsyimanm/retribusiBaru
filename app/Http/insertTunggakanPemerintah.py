import csv
import MySQLdb


with open('../../public/upload/03 201510 nunggak pemerintah ada periode tagih.txt', 'rb') as csvfile:
	i = 0
	db_tunggak          = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
	cursor_tunggak      = db_tunggak.cursor()

	spamreader = csv.reader(csvfile, delimiter='~', quotechar='|')
	header = []
	data = []
	for row in spamreader:
		if (i==0):
			header = row
			header[0] = "PELANGGAN_ID"
			header.append("BULAN")
			header.append("TAHUN")
		else:
			data = row
			data.append("1")
			data.append("2016")

			header_string =""
			j = 0
			for x in header:
				if (j!=0):
					header_string += ", "
				header_string += x.replace('"','\\"').replace("'","\\'")
				j+=1

			data_string = ""
			j = 0
			for x in data:
				if (j!=0):
					data_string += ", "
				data_string += '"' + x.replace('"','\\"').replace("'","\\'").strip() + '"'
				j+=1

			sql = '''INSERT IGNORE INTO tunggakanpemerintah (''' + header_string + ''') VALUES (''' + data_string + ''')'''
			sql_exec = cursor_tunggak.execute(sql)
			# print sql
			db_tunggak.commit()
		i+=1