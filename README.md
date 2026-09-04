# LifePoint (Legacy)
**LifePoint** is an open-source web-application to help users build new habits & connect like minded individuals based on their interests, hobbies and daily activities using **NLP** models.

<img width="960" height="496" alt="lifepoint" src="https://github.com/user-attachments/assets/217e8b37-8e95-4baf-beb2-cc43f6adb875" />

## Setup
To set up the repository on your device, first run the following `git` command inside a `/htdocs` directory:

```bash
git clone https://github.com/cagan-elden/LifePoint
```

Recommended web-server to use while working with this repository are [XAMPP](https://www.apachefriends.org/download.html) and [WAMP](https://wampserver.aviatechno.net/) servers.

Make sure that you also have `MySQL` installed on your device, recommended management tool for `MySQL` in this project is [phpmyadmin](https://www.phpmyadmin.net/), it can be downloaded alongside `XAMPP` & `WAMP` servers.

After having `MySQL` installed, adjust `db.sql` as your database.

Then to install necessary `Python` dependencies, inside `/ai` directory run:
```bash
pip install -r requirements.txt
```

**PS:** (This is a discontinued legacy build with outdated technologies, **LifePoint** is going to soon be continued in another repository using modern technologies such as `PHP 9` and `Laravel`)
