ubuntunet.net Wordpress deployment using Trellis and Bedrock
============================================================

Server Setup
------------

See also: https://roots.io/trellis/docs/remote-server-setup/

Only do this when starting afresh or when there has been some changes to the underlying software and/or OS

```
ansible-galaxy install -r requirements.yml
ansible-playbook server.yml -e env=<environment>
```

Provisioning
------------

The following directories need to belong to the user ubuntu for the provisioning to work correctly:

```
/srv/www/<sitename>
/srv/www/<sitename>/releases
/srv/www/<sitename>/shared/source
```

Run the command

```
cd trellis
./bin/deploy.sh staging wordpress.ubuntunet.net
```

(Re)Install free plugins (ToDo - Integrated into the Playbook)

```
cd /srv/www/wordpress.ubuntunet.net/current
composer update
```

Copy over the commercial plugins from ElegantThemes

```
cd /srv/www/wordpress.ubuntunet.net/current
cp -pr releases/<last_releasedate>/web/app/plugins/monarch web/app/plugins/
cp -pr releases/<last_releasedate>/web/app/plugins/bloom web/app/plugins/
cp -pr releases/<last_releasedate>/web/app/plugins/divi-100-article-card web/app/plugins/
sudo service nginx restart
``


Upgrade with Subtree
--------------------

```
git subtree pull --prefix=trellis trellis master --squash
git subtree pull --prefix=site bedrock master --squash
```


Ansible Vault
-------------

To open the Trellis Vault, navigate into the Trellis directory and run 

```
ansible-vault [view|edit] group_vars/all/vault.yml 
```
replacing the path to the vault accordingly.