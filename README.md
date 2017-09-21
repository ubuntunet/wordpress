ubuntunet.net Wordpress deployment using Trellis and Bedrock
============================================================

Server Setup
------------

See also: https://roots.io/trellis/docs/remote-server-setup/

Only do this when starting afresh or when there has been some changes to the underlying software and/or OS

```
cd trellis
ansible-galaxy install -r requirements.yml
```

This playbook gets run as the user 'ubuntu'. There is usually no need to run this, but it doesn't seem to do any harm to run it before an upgrade
```
cd trellis
ansible-playbook server.yml -e env=<environment>
```


Upgrade with Subtree
--------------------

```
git subtree pull --prefix=trellis trellis master --squash
git subtree pull --prefix=site bedrock master --squash
```



Provisioning
------------

This playbook gets run as user 'web'. This user doesn't need root privileges. For the wordpress_sites name, take the value in wordpress_sites.yml
```
cd trellis
./bin/deploy.sh <environment> <wordpress_sites name>
```


(Re)Install free plugins (ToDo - Integrated into the Playbook)

```
cd /srv/www/<fqdn>/current
sudo su web
composer update
```


Divi Theme/Plugins
------------------

The Divi theme can be installed/updated thru the web interface.

Copy over the commercial plugins from ElegantThemes (If needed)

```
cd /srv/www/<fqdn>/current
cp -pr ../<last_releasedate>/web/app/plugins/{monarch,bloom,Divi-Blog-Extras} web/app/plugins/
sudo service nginx restart
``




Ansible Vault
-------------

To open the Trellis Vault, navigate into the Trellis directory and run 

```
ansible-vault [view|edit] group_vars/all/vault.yml 
```
replacing the path to the vault accordingly.