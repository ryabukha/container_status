# stats

```sh
cat << EOF > ./.env
COMPOSE_PROJECT_NAME=horoshop
EOF

```

```sh
# Run
docker-compose up
```

```sh
# sort by cpu
docker-compose run app
docker-compose run app cpu
```
```sh
# sort by mem
docker-compose run app mem
```
