#!/bin/bash

cd ../resources/db/mysql

cat sb.db.clean.sql sb.db.sql sb.db.user.sql sb.locations.sql sb.accounts.sql sb.events.sql sb.acts.sql sb.venues.sql sb.tags.sql sb.activities.sql sb.assoc.* sb.db.prefill.sql sb.db.triggers.sql | mysql -uroot -p

if [ $1 ];
then
	echo "Including the MVP prefills too!"
	cat sb.db.mvp.prefill.sql | mysql -uroot -p satanbarbara
fi