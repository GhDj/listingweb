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
