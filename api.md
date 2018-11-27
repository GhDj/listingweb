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
`/api/user/profile/update/{id}`

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
id !** (Int)
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

### Route 
`/api/user/profile/show/{id}`

### Description 
Afficher les coordonnée d'un utilisateur)  

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
id !** (Int)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Utilisateur Introuvable : status = 404
Succès : status = 200 , user { }
```
- - - -

### Route 
`/api/media/upload`

### Description 
Créer une image dans le Storage

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
picture ** (String)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Succès : status = 200, picture = (String)
```
- - - -


### Route 
`/api/wishlist/all/{userId}`

### Description 
Afficher la list des lieux favoris d'un utilisateur 

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
userId !** (Int)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Succès : status = 200, wishlist { }
```
- - - -

### Route 
`/api/wishlist/add/{userId}`

### Description 
L'utilisateur met un lieux dans sa list des favoris

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
userId !** (Int)
id ** (Int)
type ** (Int)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Erreur : Lieux Déja Dans La List : status = 405
Succès : status = 200
```
- - - -

### Route 
`/api/wishlist/add/{userId}`

### Description 
L'utilisateur émet un lieux de sa list des favoris

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
userId !** (Int)
id ** (Int)
type ** (Int)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Succès : status = 200
```
- - - -

### Route 
`/api/review/add/{userId}`

### Description 
L'utilisateur ajout un note et/ou un commentaire sur un lieux ou equipement

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
userId !** (Int)
id ** (Int)
type ** (Int)
note ** (Int)
comment  (String)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Paramètres Introuvables : status = 404
Succès : status = 200
```
- - - -

### Route 
`/api/review/all/{userId}`

### Description 
Afficher la list des avis d'un utilisateur

### Méthode 
POST

### Inputs
** = Obligatoire \
( ) = Type \
! = Paramètre d'URL \
? = Obligatoire en condition
```
token ** (String)
userId !** (Int)
```

### Résultat

```
Erreur : Token Incorrect/Introuvable  : status = 403
Erreur : Utilisateur Introuvables : status = 404
Succès : status = 200 , reviews { }
```
- - - -

