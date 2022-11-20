#!/bin/bash
DB_P=oZdij5

rm *.csv*
echo "" > index.html;

echo "type the filename followed by enter";
read name
cp /var/www/html/uploadtest/$name .
numero=$(cat $name | wc -l);
echo "il file contiene circa $numero righe";
echo " Ora inserisci la ditta e premi enter";
read ditta
cat $name | head -5
echo "INSERISCI I NOMI DELLE COLONNE TRA I SEGUENTI color,quantity,prezzo_unit, nome, misura, codice_prodotto";
echo "PRIMA COLONNA"
read colonna1
echo "SECONDA COL";
read colonna2
echo "TERZA COL";
read colonna3
echo "QUARTA COL";
read colonna4
echo "QUINTA COL";
read colonna5
echo "SESTA COL(fine)";
read colonna6
echo "ok";

cp $name $name.a
cat $name.a | sed s/\'//g > $name
mv $name $name.a
cat $name.a | sed s/\"//g > $name



mysql -u root -h localhost --password=$DB_P -e "truncate table fichier" xls_sql
wget -O index.html 'http://127.0.0.1/xls-sql/xls_sql.php?ditta='$ditta;
mysql -u root -h localhost --password=$DB_P -e "DELETE FROM fichier where col1='' and col4=''" xls_sql 
mysqldump --compact -t -c -u root --password=$DB_P xls_sql > fichier_dump_db.sql
cp fichier_dump_db.sql fichier_dump_2.sql
sed 's/fichier/prodotto/g' < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed "s/col1/$colonna1/g"  < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed "s/col2/$colonna2/g" < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed "s/col3/$colonna3/g" < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed "s/col4/$colonna4/g"  < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed 's/col7/categoria/g'  < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed "s/col5/$colonna5/g"  < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed "s/col6/$colonna6/g" < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed 's/\\r\\n/ /g'  < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
sed 's/\\n/ /g'  < fichier_dump_db.sql > fichier_dump_2.sql
mv fichier_dump_2.sql fichier_dump_db.sql
echo "<a href=fichier_dump_db.sql>file just created</a>" >> index.html
echo "ora contiene $(cat fichier_dump_db.sql | wc -l)"
cp fichier_dump_db.sql ../gestionALE/aggiorna/$ditta.sql
ls -l ../gestionALE/aggiorna/
ls -l
