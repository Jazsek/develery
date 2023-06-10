# Telepítés és futtatás  
Első lépésként pullolni kell az egész repot.

## Adatbázis futtatás:
Az adatbázis használatához szükség lesz egy docker container futtatására. Ennek előfeltétele, hogy az adott eszközre fel legyen telepítve a docker desktop. Az [alábbi](https://www.docker.com/products/docker-desktop/) oldalról letölthető és telepíthető.  
  
Ha fut a docker desktopunk akkor a project root mappájában adjuk ki az indításhoz szükséges parancsot: `docker-compose up -d`.  
  
**Fontos!** A `docker-compose.yml` fájlban található egy `platform: linux/arm64/v8` nevű sor. Erre csak akkor van szükséges, ha az adott eszköz amin a container futtatásra kerül az egy M1-es chippel szerelt macbook. Ha más típusú gépről beszélünk, akkor ez nyugodtan commentelhető.

## Symfony futtatás:  
`symfony server:start` *(Bár ezt gyanítom nem kell bemutatnom :) )*

## Bootstrap és css használat:  
`npm run watch` futtatás
