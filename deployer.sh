set -e

echo 'Deploying...'

(php artisan down --message 'The App is being (Quickly!), Maintenance')

    git pull origin Version5

php artisan up

echo 'Deployed'

