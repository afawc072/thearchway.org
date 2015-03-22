#The Archway Installation Script

#  !!!!!!Describe Package Installation!!!!
# Confirm user's consent

answer="a"

echo "     *******************************************************"
echo "     *							                           *"
echo "     *							 	                       *"
echo "     *							 				           *"
echo "     *	          - T H E   A R C H W A Y -                *"
echo "     *		             - SETUP -                         *"
echo "     *						 	 				           *"
echo "     *						 	 				           *"
echo "     *******************************************************"

sleep 5

echo " Setup Install List:"
echo "     -lighttpd"
echo "     -php5-common php5-cig php5"
echo "     -php5-mysql"
echo "     -Enabling fastcgi-php for PHP5"
echo " "


while [ "$answer" != "Y" ] && [ "$answer" != "n" ];
do

echo "Do you accept the installation of the previously listed services(Y/n):"
read answer

if [ $answer = "n" ];
then
	break
fi

echo -n "The installation of the services will begin shortly"
sleep 1
echo -n " ."
sleep 1
echo -n " ."
sleep 1
echo -n " ."
sleep 1
echo ""
echo "Lighttpd Install"
sleep 1
sudo apt-get -y  install lighttpd
echo "PHP5 Install"
sleep 1
sudo apt-get -y install php5-common php5-cgi php5
echo "Mysql Module for PHP5 Install"
sleep 1
sudo apt-get -y install php5-mysql
echo "Enabling FastCGI for PHP"
sleep 1
sudo lighty-enable-mod fastcgi-php
echo "Force Reloading Lighttpd"
sleep 1
sudo service lighttpd force-reload


done