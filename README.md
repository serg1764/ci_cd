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

## Развертывание в продакшн

### Настройка переменных окружения

Создайте файл `.env.prod` с необходимыми переменными:

```bash
# Версия приложения
APP_VERSION=v1

# Тег Docker образа (latest, SHA коммита или конкретная версия)
IMAGE_TAG=latest

# GitHub репозиторий (замените на свой)
GITHUB_REPOSITORY=username/ci_cd
```

### Аутентификация в GitHub Container Registry

Для доступа к образам в GHCR выполните:

```bash
# Создайте Personal Access Token (PAT) в GitHub с правами read:packages
# Затем войдите в GHCR:
docker login ghcr.io -u USERNAME -p YOUR_PAT

# Или если пакеты публичные - аутентификация не требуется
```

### Запуск продакшн окружения

```bash
# Загрузить образы из GHCR
docker compose -f docker-compose.prod.yml --env-file .env.prod pull

# Запустить все сервисы
docker compose -f docker-compose.prod.yml --env-file .env.prod up -d --remove-orphans

# Проверить статус
docker compose -f docker-compose.prod.yml --env-file .env.prod ps

# Проверить логи
docker compose -f docker-compose.prod.yml --env-file .env.prod logs -f
```

### Остановка продакшн окружения

```bash
docker compose -f docker-compose.prod.yml --env-file .env.prod down
```

### Примечания

- Образы автоматически собираются при push в `master` через GitHub Actions
- Для использования конкретной версии установите `IMAGE_TAG=<sha-коммита>`
- Убедитесь, что образы опубликованы в GHCR перед развертыванием
