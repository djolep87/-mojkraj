#!/bin/bash

# Performance Testing Script za Moj Kraj
# Koristi Apache Bench (ab) koji dolazi sa XAMPP-om

echo "🚀 Moj Kraj - Performance Testing Script"
echo "=========================================="
echo ""

# Boje za output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Base URL - PROMENI AKO JE POTREBNO
BASE_URL="http://localhost/mojkraj/public"

# AB binary location (XAMPP)
AB="/Applications/XAMPP/xamppfiles/bin/ab"

# Provera da li ab postoji
if [ ! -f "$AB" ]; then
    echo -e "${RED}❌ Apache Bench (ab) nije pronađen!${NC}"
    echo "Očekivana lokacija: $AB"
    exit 1
fi

echo -e "${GREEN}✅ Apache Bench pronađen${NC}"
echo ""

# Test 1: Homepage
echo "📊 TEST 1: Homepage Load Test"
echo "-----------------------------"
echo "Test: 100 zahteva, 10 konkurentnih korisnika"
$AB -n 100 -c 10 -q "$BASE_URL/" > test1_homepage.txt 2>&1

# Parse results
RPS1=$(grep "Requests per second" test1_homepage.txt | awk '{print $4}')
TIME1=$(grep "Time per request.*mean" test1_homepage.txt | head -1 | awk '{print $4}')
FAILED1=$(grep "Failed requests" test1_homepage.txt | awk '{print $3}')

echo -e "  Requests/sec: ${GREEN}$RPS1${NC}"
echo -e "  Avg Time: ${GREEN}$TIME1 ms${NC}"
echo -e "  Failed: ${YELLOW}$FAILED1${NC}"
echo ""

# Test 2: Login Page
echo "📊 TEST 2: Login Page Load Test"
echo "-------------------------------"
echo "Test: 100 zahteva, 10 konkurentnih korisnika"
$AB -n 100 -c 10 -q "$BASE_URL/login" > test2_login.txt 2>&1

RPS2=$(grep "Requests per second" test2_login.txt | awk '{print $4}')
TIME2=$(grep "Time per request.*mean" test2_login.txt | head -1 | awk '{print $4}')
FAILED2=$(grep "Failed requests" test2_login.txt | awk '{print $3}')

echo -e "  Requests/sec: ${GREEN}$RPS2${NC}"
echo -e "  Avg Time: ${GREEN}$TIME2 ms${NC}"
echo -e "  Failed: ${YELLOW}$FAILED2${NC}"
echo ""

# Test 3: About Page
echo "📊 TEST 3: About Page Load Test"
echo "-------------------------------"
echo "Test: 100 zahteva, 10 konkurentnih korisnika"
$AB -n 100 -c 10 -q "$BASE_URL/o-nama" > test3_about.txt 2>&1

RPS3=$(grep "Requests per second" test3_about.txt | awk '{print $4}')
TIME3=$(grep "Time per request.*mean" test3_about.txt | head -1 | awk '{print $4}')
FAILED3=$(grep "Failed requests" test3_about.txt | awk '{print $3}')

echo -e "  Requests/sec: ${GREEN}$RPS3${NC}"
echo -e "  Avg Time: ${GREEN}$TIME3 ms${NC}"
echo -e "  Failed: ${YELLOW}$FAILED3${NC}"
echo ""

# Test 4: Stress Test (Higher Load)
echo "📊 TEST 4: Stress Test"
echo "----------------------"
echo "Test: 500 zahteva, 50 konkurentnih korisnika"
$AB -n 500 -c 50 -q "$BASE_URL/" > test4_stress.txt 2>&1

RPS4=$(grep "Requests per second" test4_stress.txt | awk '{print $4}')
TIME4=$(grep "Time per request.*mean" test4_stress.txt | head -1 | awk '{print $4}')
FAILED4=$(grep "Failed requests" test4_stress.txt | awk '{print $3}')

echo -e "  Requests/sec: ${GREEN}$RPS4${NC}"
echo -e "  Avg Time: ${GREEN}$TIME4 ms${NC}"
echo -e "  Failed: ${YELLOW}$FAILED4${NC}"
echo ""

# Summary
echo "=========================================="
echo "📈 SUMMARY"
echo "=========================================="
echo ""
echo "| Test | Req/sec | Avg Time (ms) | Failed |"
echo "|------|---------|---------------|--------|"
echo "| Homepage | $RPS1 | $TIME1 | $FAILED1 |"
echo "| Login | $RPS2 | $TIME2 | $FAILED2 |"
echo "| About | $RPS3 | $TIME3 | $FAILED3 |"
echo "| Stress | $RPS4 | $TIME4 | $FAILED4 |"
echo ""

# Recommendations
echo "=========================================="
echo "💡 PREPORUKE"
echo "=========================================="

# Avg RPS across tests
AVG_RPS=$(echo "scale=2; ($RPS1 + $RPS2 + $RPS3) / 3" | bc)
AVG_TIME=$(echo "scale=2; ($TIME1 + $TIME2 + $TIME3) / 3" | bc)

echo -e "Prosečan Request/sec: ${GREEN}$AVG_RPS${NC}"
echo -e "Prosečno vreme: ${GREEN}$AVG_TIME ms${NC}"
echo ""

# Evaluacija
if (( $(echo "$AVG_RPS < 20" | bc -l) )); then
    echo -e "${RED}❌ KRITIČNO: Sajt može da podrži samo 5-15 korisnika${NC}"
    echo "   Preporuka: ODMAH prebaci na MySQL!"
elif (( $(echo "$AVG_RPS < 100" | bc -l) )); then
    echo -e "${YELLOW}⚠️  UPOZORENJE: Sajt može da podrži 50-100 korisnika${NC}"
    echo "   Preporuka: Dodaj indekse i Redis cache"
elif (( $(echo "$AVG_RPS < 500" | bc -l) )); then
    echo -e "${GREEN}✅ DOBRO: Sajt može da podrži 200-500 korisnika${NC}"
    echo "   Preporuka: Optimizuj query-je i dodaj CDN"
else
    echo -e "${GREEN}🎉 ODLIČNO: Sajt je spreman za produkciju!${NC}"
    echo "   Kapacitet: 1,000+ korisnika"
fi

echo ""
echo "Detaljni rezultati sačuvani u:"
echo "  - test1_homepage.txt"
echo "  - test2_login.txt"
echo "  - test3_about.txt"
echo "  - test4_stress.txt"
echo ""
echo "=========================================="






