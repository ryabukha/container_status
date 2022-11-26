#!/usr/bin/env bash

set -o errexit
set -o nounset
set -o pipefail

function _sh {
    local command=$1
    sh -c "${command}"
}

_sh "docker container ls \
  --filter label=com.docker.compose.project=${COMPOSE_PROJECT_NAME} \
  --format \"{{json .Names}}, {{json .Image}}\""
