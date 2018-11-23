## API

### Route 
`/api/user/register`

### Description 
L'utilisateur inscrit comme un professionnel ou comme un consultant

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
first_name ** (String)
last_name ** (String)
email ** (String)
password ** (String)
gender ** (Char)
role ** (String)
address (Array) 
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Erreur : Utilisateur déja exist : status = 400
Succès : status = 200
```
- - - -

### Route 
`/api/user/login`

### Description 
Permettre à l'utilisateur de se connecter

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
email ** (String)
password ** (String)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Erreur : Connexion refusé : status = 405
Erreur : Utilisateur Introuvable ou inactive : status = 400
Succès : status = 200 , user { }
```
- - - -

### Route 
`/api/user/profile/update`

### Description 
Permettre à l'utilisateur de ce modifier ces coordonnées  

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
first_name  (String)
last_name  (String)
password  (String)
newPassword ? (String)
email  (String)
phone  (Integer)
gender  (Char)
picture (String)
address  (Array)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Utilisateur Introuvable : status = 404
Erreur : Mot de Passe Incorrect : status = 300
Erreur : Nouveau Mot de Passe Refusé : status = 301
Succès : status = 200 , user { }
```
- - - -