ubuntunet.net Wordpress deployment using Trellis and Bedrock
============================================================

The following directories need to belong to the user ubuntu for the provisioning to work correctly:

```
/srv/www/<sitename>
/srv/www/<sitename>/releases
/srv/www/<sitename>/shared/source
```

Ansible Vault
-------------

To open the Trellis Vault, navigate into the Trellis directory and run 

```
ansible-vault [view|edit] group_vars/all/vault.yml 
```
replacing the path to the vault accordingly.