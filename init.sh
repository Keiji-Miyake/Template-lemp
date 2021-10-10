# create .env file
echo "UID=$(id -u $USER)" > .env
echo "GID=$(id -g $USER)" >> .env
echo "USERNAME=$USER" >> .env

# create data dir
mkdir .devcontainer/docker/postgres/data 2> /dev/null

exit 0