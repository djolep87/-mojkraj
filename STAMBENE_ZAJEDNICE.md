# 🏢 Stambene zajednice - Moj Kraj

## 📋 Pregled

Modul "Stambene zajednice" omogućava korisnicima da upravljaju zgradama, stanarima, troškovima, prijavama kvarova i glasanjima.

## 🚀 Kako da pristupite

1. **Prijavite se** na Moj Kraj sa svojim nalogom
2. **Kliknite na "Stambene zajednice"** u glavnom meniju
3. **Kreirajte zgradu** ili se pridružite postojećoj

## 🎯 Funkcionalnosti

### 👥 Uloge korisnika

-   **Manager** - može uređivati sve (dodavati troškove, kreirati glasanja, upravljati stanarima)
-   **Stanar** - može prijavljivati kvarove, glasati i pregledati troškove

### 🏠 Upravljanje zgradama

-   **Kreiranje zgrade** - dodajte novu zgradu sa osnovnim informacijama
-   **Dodavanje stanara** - pozovite korisnike da se pridruže zgradi
-   **Upravljanje ulogama** - dodelite uloge manager/stanar

### 📊 Troškovi

-   **Evidencija troškova** - dodajte troškove po kategorijama
-   **Statistike** - pregledajte troškove po mesecu/godini
-   **Kategorije** - organizujte troškove (održavanje, struja, voda, itd.)

### 🔧 Prijave kvarova

-   **Prijavljivanje kvarova** - stanari mogu prijaviti probleme
-   **Upload slika** - priložite fotografije kvara
-   **Praćenje statusa** - otvoreno/zatvoreno
-   **Upravljanje** - manageri mogu zatvoriti prijave

### 🗳️ Glasanja

-   **Kreiranje glasanja** - manageri kreiraju glasanja
-   **Više opcija** - dodajte različite opcije za glasanje
-   **Rok za glasanje** - postavite deadline
-   **Rezultati** - pregledajte rezultate glasanja

### 📢 Objave

-   **Kreiranje objava** - manageri mogu kreirati objave
-   **Prikvačivanje** - važne objave mogu biti prikvačene
-   **Sortiranje** - prikvačene objave se prikazuju prvo

## 🔗 API Endpointi

Modul takođe podržava REST API za integraciju sa mobilnim aplikacijama:

```
GET    /api/buildings                    - lista zgrada
POST   /api/buildings                    - kreiranje zgrade
GET    /api/buildings/{id}               - detalji zgrade
PUT    /api/buildings/{id}               - ažuriranje zgrade
DELETE /api/buildings/{id}               - brisanje zgrade

POST   /api/buildings/{id}/reports       - prijava kvara
GET    /api/buildings/{id}/reports       - lista prijava
PATCH  /api/buildings/{id}/reports/{id}/close - zatvaranje prijave

POST   /api/buildings/{id}/expenses      - dodavanje troška
GET    /api/buildings/{id}/expenses      - lista troškova
GET    /api/buildings/{id}/expenses-stats - statistike

POST   /api/buildings/{id}/votes         - kreiranje glasanja
POST   /api/buildings/{id}/votes/{id}/vote - glasanje
GET    /api/buildings/{id}/votes/{id}/results - rezultati

POST   /api/buildings/{id}/announcements - kreiranje objave
PATCH  /api/buildings/{id}/announcements/{id}/pin - prikvačivanje
```

## 🧪 Testiranje

Modul je potpuno testiran sa 8 testova koji pokrivaju:

-   ✅ Kreiranje zgrada
-   ✅ Prijave kvarova
-   ✅ Troškovi
-   ✅ Glasanja
-   ✅ Objave
-   ✅ Autorizacija i uloge
-   ✅ Kontrola pristupa

## 🔮 Buduće funkcionalnosti

-   **AI analiza troškova** - automatska analiza i predlozi optimizacije
-   **Push notifikacije** - obaveštenja o novim prijavama i glasanjima
-   **Mobilna aplikacija** - native iOS/Android aplikacija
-   **Integracija sa bankama** - automatsko praćenje troškova
-   **Kalendar događaja** - planiranje sastanaka stanara

## 📞 Podrška

Za pitanja ili probleme, kontaktirajte tim za podršku na: support@mojkraj.rs

---

**Modul je spreman za produkciju!** 🎉


