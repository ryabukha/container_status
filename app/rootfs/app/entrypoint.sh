#!/usr/bin/env bash
set -o errexit
set -o nounset
set -o pipefail

exec php /app/stats.php $@
