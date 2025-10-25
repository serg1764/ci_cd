# Symfony Microservices Mono-repo

5 микросервисов Symfony с Docker и Traefik.

## Запуск

```bash
docker compose up -d
```

## Тестирование

```bash
# Проверка сервисов
curl http://localhost/svc1/api/hello
curl http://localhost/svc2/api/hello
curl http://localhost/svc3/api/hello
curl http://localhost/svc4/api/hello
curl http://localhost/svc5/api/hello

# Проверка health
curl http://localhost/svc1/healthz
```

## Остановка

```bash
docker compose down
```
