pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/dzulfiqar03/tubes_komputasiawan_seeU.git'
            }
        }
        stage('Send Dockerfile to Ansible') {
			steps {
                echo 'Executing Ansible Playbook'
                ansiblePlaybook credentialsId: 'seeU_website', disableHostKeyChecking: true, installation: 'Ansible', inventory: 'ansible-project/playbook/hosts', playbook: 'ansible-project/playbook/copy_dockerfile.yml', vaultTmpPath: ''
            }
        }
        stage('Build') {
            steps {
                sh 'docker build . -t node-todo-app'
            }
        }
        stage('Run') {
            steps {
                sh 'docker run -d -p 8000:8000 --name node-todo-app node-todo-app'
            }
        }
        stage('Copy Files to Kubernetes') {
            steps {
                sh 'scp file1.txt user@kubernetes-server:./'
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                ansiblePlaybook playbook: 'deploy.yml'
            }
        }
    }
}