#!/usr/bin/python
import MySQLdb
import time
import sys
import math
import threading

def check(bot, top, index):
    # print 'grader'+str(index)
    j = bot
    db_tunggak            = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
    cursor_tunggak        = db_tunggak.cursor()
    db_retribusi          = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
    cursor_retribusi      = db_retribusi.cursor()
    while (True):
        try:
            sql_retribusi         = '''select id, pelanggan_id, tgl_lunas, bulan, tahun from retribusipemerintah where status_cek = 0 and id between '''+str(bot)+''' and '''+str(top)
            tanda                 = 0
            temp                  = cursor_retribusi.execute(sql_retribusi)
            if (temp != 0): 
                tanda = 1

            elif (temp == 0):
                print "TIDAK ADA YANG NOL "+str(index)
                j+=1
                sys.exit(0)

            if (tanda==1):
                unchecked = cursor_retribusi.fetchone()
                while (unchecked is not None):
                    id_retribusi    = unchecked[0]
                    no_plg_ret      = unchecked[1]
                    tgl_lunas       = unchecked[2]
                    bulan           = unchecked[3]
                    tahun           = unchecked[4]
                    # print str(id_retribusi)+' '+str(no_plg_ret)+' '+str(tgl_lunas)+' '+str(bulan)+' '+str(tahun)+'\n'
                    sql             = '''select * from tunggakanpemerintah where pelanggan_id ='''+str(no_plg_ret)+''' having min(id)'''
                    sql_exec        = cursor_tunggak.execute(sql)
                    tunggak         = cursor_tunggak.fetchone()
                    if (tunggak is not None):
                        id_tunggak      = tunggak[0]
                        pelanggan_id    = tunggak[1]
                        nama            = tunggak[2]
                        jalan           = tunggak[3]
                        gang            = tunggak[4]
                        nomor           = tunggak[5]
                        notamb          = tunggak[6]
                        da              = tunggak[7]
                        kd_tarif        = tunggak[8]
                        retribusi       = tunggak[9]
                        listrik         = tunggak[10]
                        lbr_jalan       = tunggak[11]
                        periode_tagih   = tunggak[12]
                        ketstatus       = tunggak[13]

                        insert              = '''insert into lunaspemerintah (pelanggan_id, nama, jalan, gang, nomor, notamb, da, kd_tarif, retribusi, listrik, lbr_jalan, periode_tagih, ketstatus, tgl_lunas, bulan, tahun) values('''+str(pelanggan_id)+''',"'''+str(nama)+'''","'''+str(jalan)+'''","'''+str(gang)+'''","'''+str(nomor)+'''","'''+str(notamb)+'''","'''+str(da)+'''","'''+str(kd_tarif)+'''",'''+str(retribusi)+''','''+str(listrik)+''','''+str(lbr_jalan)+''','''+str(periode_tagih)+''',"'''+str(ketstatus)+'''","'''+str(tgl_lunas)+'''","'''+str(bulan)+'''","'''+str(tahun)+'''")'''
                        insert_exec         = cursor_retribusi.execute(insert)
                        delete              = '''delete from tunggakanpemerintah where id='''+str(id_tunggak) 
                        delete_exec         = cursor_tunggak.execute(delete)

                        if (insert_exec and delete_exec):
                            update_status           = '''update retribusipemerintah set status_cek = 1 where id = '''+str(id_retribusi)
                            update_status_exec      = cursor_retribusi.execute(update_status)
                            if (update_status_exec):
                                print 'updated '+str(id_retribusi)+''' index = '''+str(index)
                            else:
                                print 'gagal update status'
                            
                        elif (not insert_exec and delete_exec):
                            print 'gagal insert'
                        elif (insert_exec and not delete_exec):
                            print 'gagal delete'

                    else:
                        update_status           = '''update retribusipemerintah set status_cek = 1 where id = '''+str(id_retribusi)
                        update_status_exec      = cursor_retribusi.execute(update_status)
                        print 'tidak nunggak '+str(id_retribusi)+''' index = '''+str(index)
                    unchecked = cursor_retribusi.fetchone()
                db_retribusi.commit()
        except:
            print 'masuk except'
            bot+=1
            db_retribusi.commit()
            sys.exit(0)


try:
    i=1
    threads               = []
    db_tunggak            = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
    cursor_tunggak        = db_tunggak.cursor()
    db_retribusi          = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
    cursor_retribusi      = db_retribusi.cursor()
    sqlSum                = '''select count(*) from retribusipemerintah where status_cek=0'''
    sqlSum_exec           = cursor_retribusi.execute(sqlSum)
    sqlSumData            = cursor_retribusi.fetchone()
    minID                 = '''select min(id) from retribusipemerintah where status_cek=0'''
    minID_exec            = cursor_retribusi.execute(minID)
    minIDData             = cursor_retribusi.fetchone()
    divSum                = sqlSumData[0]/4
    a                     = minIDData[0]
    b                     = minIDData[0]
    index                 = 1
    while (a<sqlSumData[0]):
        b = b + divSum
        # print index
        if (b > sqlSumData[0]):
            b = sqlSumData[0] + 10
        # print 'a = '+str(a)+' b = '+ str(b)
        t = threading.Thread(target=check, args=(a,b,index,))
        threads.append(t)
        t.start()
        index += 1
        a = b
    
    for x in threads:
        x.join()
        
    print 'mau exit'    
    db_tunggak.close()
    db_retribusi.close()
    sys.exit(0)

except KeyboardInterrupt:
  sys.exit(0)
except:
  print 'berhenti'
  # execfile(retribusi.py)