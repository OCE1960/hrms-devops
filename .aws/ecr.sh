#!/bin/bash

export MY_AWS_REGION='eu-west-2'
export MY_ECR_REPOSITORY='swe7103/hrms'

aws ecr create-repository \
    --repository-name ${MY_ECR_REPOSITORY} \
    --region ${MY_AWS_REGION}