#/!bin/bash

user_name=$1
password=$2
host=$3
database=$4

path=/opt/backups/database

TIME_STAMP="$(date +%Y-%m-%d)"

mkdir -p $path

mysqldump -h localhost -u$user_name -p$password -h $host $database > $path/rbta-${TIME_STAMP}.sql