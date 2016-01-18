#Intall Order
This is the order in which the files to create the database schema should be loaded.

```

cat mvr.db.sql mvr.db.user.sql mvr.locations.sql mvr.accounts.sql mvr.programs.sql mvr.advertisers.sql mvr.rewards.sql mvr.activities.sql mvr.assoc.* mvr.db.prefill.sql | mysql -uroot -p

```


If db is empty, create one 'location' record with id=0 so that other objects can have a default reference