#!/usr/bin/python
import MySQLdb
import time
import sys
try:
    j=1
    i=1
    while True:
        try:
            db_pelanggan= MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
            cursor_pelanggan = db_pelanggan.cursor()
            db_retribusi= MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
            cursor_retribusi = db_retribusi.cursor()
            sql_retribusi = '''select id, pelanggan_id, kd_tarif, retribusi from retribusi where status_cek = 0'''
            tanda = 0
            temp = cursor_retribusi.execute(sql_retribusi)
            if (temp != 0 ): 
                tanda = 1
            elif (temp == 0):
                time.sleep(1800)
                # print "tidak ada yg nol "+str(j)
                j+=1
            if (tanda==1):
                unchecked = cursor_retribusi.fetchone()
                if (unchecked is not None):
                    id_retribusi = unchecked[0]
                    no_plg_ret = unchecked[1]
                    kd_tarif = unchecked[2]
                    retribusi = unchecked[3]
                    sql = '''select retribusi, kd_tarif from pelanggan where no_plg ='''+str(no_plg_ret)
                    sql_exec = cursor_pelanggan.execute(sql)
                    ret_plg = cursor_pelanggan.fetchone()
                    if (str(ret_plg[0]) != str(retribusi) and str(ret_plg[1]) != str(kd_tarif)):
                        flag = 1
                    elif (str(ret_plg[0]) != str(retribusi) and str(ret_plg[1]) == str(kd_tarif)):
                        flag = 2
                    elif (str(ret_plg[0]) == str(retribusi) and str(ret_plg[1]) != str(kd_tarif)):
                        flag = 3
                    elif (str(ret_plg[0]) == str(retribusi) and str(ret_plg[1]) == str(kd_tarif)):
                        flag = 0
                    if (flag==1): 
                        update1 = '''update retribusi set status_cek = 1 where id = '''+str(id_retribusi)
                        cursor_retribusi.execute(update1)
                        insert1 = '''insert into difference (retribusi_id,pelanggan_id,keterangan) values('''+str(id_retribusi)+''','''+str(no_plg_ret)+''',1)'''
                        cursor_retribusi.execute(insert1)
                        db_retribusi.commit()
                        # print 'tidak sama semua '+str(i)

                    elif (flag==2): 
                        update1 = '''update retribusi set status_cek = 1 where id = '''+str(id_retribusi)
                        cursor_retribusi.execute(update1)
                        insert1 = '''insert into difference (retribusi_id,pelanggan_id,keterangan) values('''+str(id_retribusi)+''','''+str(no_plg_ret)+''',2)'''
                        cursor_retribusi.execute(insert1)
                        db_retribusi.commit()
                        # print 'tidak sama retribusi '+str(i)

                    elif (flag==3): 
                        update1 = '''update retribusi set status_cek = 1 where id = '''+str(id_retribusi)
                        cursor_retribusi.execute(update1)
                        insert1 = '''insert into difference (retribusi_id,pelanggan_id,keterangan) values('''+str(id_retribusi)+''','''+str(no_plg_ret)+''',3)'''
                        cursor_retribusi.execute(insert1)
                        db_retribusi.commit()
                        # print 'tidak sama kode tarif '+str(i)

                    elif (flag==0): 
                        update2 = '''update retribusi set status_cek = 1 where id = '''+str(id_retribusi)
                        cursor_retribusi.execute(update2)
                        # print 'sama semua '+str(i)
                        
                    i+=1
                db_retribusi.commit()
        except:
            sql_retribusi = '''select id, pelanggan_id, kd_tarif, retribusi from retribusi where status_cek = 0'''
            tanda = 0
            temp = cursor_retribusi.execute(sql_retribusi)
            if (temp != 0 ): 
                tanda = 1
            if (tanda==1):
                unchecked = cursor_retribusi.fetchone()
                if (unchecked is not None):
                    id_retribusi = unchecked[0]
                    no_plg_ret = unchecked[1]
                    kd_tarif = unchecked[2]
                    retribusi = unchecked[3]
            update1 = '''update retribusi set status_cek = 1 where id = '''+str(id_retribusi)
            cursor_retribusi.execute(update1)
            insert1 = '''insert into difference (retribusi_id,pelanggan_id,keterangan) values('''+str(id_retribusi)+''','''+str(no_plg_ret)+''',4)'''
            temp = cursor_retribusi.execute(insert1)
            # print 'pelanggan tidak ada '+str(i)
            i+=1
            db_retribusi.commit()
    #time.sleep(1)
    db_pelanggan.close()
    db_retribusi.close()
except KeyboardInterrupt:
  sys.exit(0)
except:
  print 'berhenti'
  # execfile(retribusi.py)