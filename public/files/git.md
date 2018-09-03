-------

[TOC]

-------

## git 简单教程
Git是一个开源的分布式版本控制系统。

Git 与 SVN 区别点：

- GIT是分布式的，SVN不是：这是GIT和其它非分布式的版本控制系统，例如SVN，CVS等，最核心的区别。
- GIT把内容按元数据方式存储，而SVN是按文件：所有的资源控制系统都是把文件的元信息隐藏在一个类似.svn,.cvs等的文件夹里。
- GIT分支和SVN的分支不同：分支在SVN中一点不特别，就是版本库中的另外的一个目录。
- GIT没有一个全局的版本号，而SVN有：目前为止这是跟SVN相比GIT缺少的最大的一个特征。
- GIT的内容完整性要优于SVN：GIT的内容存储使用的是SHA-1哈希算法。这能确保代码内容的完整性，确保在遇到磁盘故障和网络问题时降低对版本库的破坏。


> [git的五分钟教程](http://www.runoob.com/w3cnote/git-five-minutes-tutorial.html)
>
> [git简明指南](http://www.runoob.com/manual/git-guide/)

<br>
### 基本命令

#### 创建新仓库

选择任意一个目录，进行初始化：

```
git init
```

#### 将远程仓库克隆到本地

```
git clone username@host:/path/to/repository
```

#### 配置个人信息

```
git config username '***'
git config useremail ***@**
```

#### 连接远程仓库

```
git remote add oringin(server)
```

#### 工作流

你的本地仓库由 git 维护的三棵“树”组成。第一个是你的 工作目录，它持有实际文件；第二个是 暂存区（Index），它像个缓存区域，临时保存你的改动；最后是 HEAD，它指向你最后一次提交的结果。

#### 添加和提交

你可以提出更改（把它们添加到暂存区），使用如下命令:

```
git add <filename>
git add *
```

这是 git 基本工作流程的第一步；使用如下命令以实际提交改动：

```
git commit -m "代码提交信息"
```

现在，你的改动已经提交到了 HEAD，但是还没到你的远端仓库。

#### 查看修改信息

```
git status
```

#### 推送改动

```
git push origin master
```

### 分支

分支是用来将特性开发绝缘开来的。在你创建仓库的时候，master 是“默认的”分支。在其他分支上进行开发，完成后再将它们合并到主分支上。

#### 创建分支

创建一个叫做“feature_x”的分支，并切换过去：

```
git checkout -b feature_x
```

切换回主分支：

```
git checkout master
```

再把新建的分支删掉：

```
git branch -d feature_x
```

除非你将分支推送到远端仓库，不然该分支就是 不为他人所见的：

```
git push origin <branch>
```

### 搭建git服务器

<br>
> 服务器操作系统：CentOS-7.2-64

<br>

#### **Step1 - 安装**

首先要在在服务器上安装`git`。

```
yum install git
```

> 如果权限不够，可以加`sudo`

#### Step2 - 添加用户

创建一个`git`用户，用来运行`git`服务：

```
sudo adduser git
```

> 也可以添加用户密码

```
sudo passwd git
```

#### Step3 - 创建证书登录

> 收集所有需要登录的用户的公钥，即id_rsa.pub
> 
> 把所有公钥导入到`/home/git/.ssh/authorized_keys`文件

#### Step4 - 初始化Git仓库

选定一个目录作为`git`仓库初始化。

```
git init --bare test.git
```

> 也可以自己新建一个目录作为`git`仓库，然后初始化

```
mkdir git_test
cd git_test
git init --bare test.git
```

#### Step5 - 禁用shell登录

出于安全考虑，第二步创建的`git`用户不允许登录`shell`，这可以通过编辑`/etc/passwd`文件完成。找到类似下面的一行：

```
git:x:1001:1001:,,,:/home/git:/bin/bash
```

改为：

```
git:x:1001:1001:,,,:/home/git:/usr/bin/git-shell
```

> 这样，git用户可以正常通过ssh使用git，但无法登录shell，因为我们为git用户指定的git-shell每次一登录就自动退出

#### Step6 - 克隆远程仓库

> 这一步需要在自己的电脑上完成，而不是服务器上。

生成 id_rsa.pub文件：

```
$ ssh-keygen -t rsa
```

将生成的`id_rsa.pub`文件里面的内容拷贝到服务端的`authorized_keys` 文件。这样就可以通过`git clone`命令来克隆远程仓库了。

```
git@github.com:mysterisc/cc-demo.git
```

------

 END!