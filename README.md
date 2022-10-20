# Structure MVC

Cette structure est réalisée à des fins pédagogiques. Elle est un intermédiaire permettant d'introduire les concepts du
framework Laravel sur des bases de développement PHP connu.

- [Document associé disponible ici](https://cours.brosseau.ovh/tp/php/mvc/tp1.html)
- [Exemple de code utilisant cette structure](https://github.com/c4software/demo-structure-mvc-video/)

---

## Usage

### Initialiser la base de données

```shell
php mvc db:migrate
```

### Créer un nouveau modèle

```shell
php mvc model:create NomDuModele
```

### Créer un nouveau controller

```shell
php mvc controller:create NomDuControler
```

### Lancer le projet

```shell
php mvc serve
```

## Déployer sur Apache ou Docker

- [Déployer sur Apache](https://cours.brosseau.ovh/tp/ops/mini-mvc-sample/deployer-mini-mvc-sample.html)
- [Déployer avec Docker](https://cours.brosseau.ovh/tp/ops/mini-mvc-sample/mini-mvc-sample-docker.html)

---

Ce projet est réalisé à des fins pédagogiques. [Document associé disponible ici](https://cours.brosseau.ovh/tp/php/mvc/tp1.html)

---

**Note importante**, cette architecture est à but pédagogique seulement, si vous souhaitez réaliser un développement MVC je vous conseille fortement de partir sur une solution type Laravel.