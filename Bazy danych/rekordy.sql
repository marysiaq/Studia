use sklepik;

insert into kategorie_produktow (id,kategoria) values (1,"suszone owoce");
insert into kategorie_produktow (id,kategoria) values (2,"nasiona i pestki"),
(3,"orzechy"),
(4,"kremy i pasty"),
(5,"warzywa"),
(6,"algi i glony"),
(7,"oleje");

insert into produkt (id,id_kategoria,nazwa, cena, opis, sklad, ilosc) values (1,
1,"Daktyle Bio suszone 250g",13.90,
"Daktyle to owoce daktylowca, czyli najstarszego drzewa owocowego na świecie.
Daktyle poleca się w szczególności osobom intensywnie uprawiającym sport,
z uwagi na ich pozytywny wpływ na wzrost energii.",
"100% BIO daktyle suszone, bezpestkowe", 90),
(2,2, "Pestki dyni - łuskane Bio 300g",22.90,
"Pestki dyni są bardzo kaloryczne, ale przy tym bardzo zdrowe.
 Posiadają wiele witamin i mikroelementów. Zawierają m.in.: nienasycone kwasy tłuszczowe,
 witaminy z grupy B, witaminy A, E, C, wapń, magnez, fosfor, żelazo, potas, cynk,
 fitosterole i wiele innych. ",
 "100% łuskane pestki dyni bio", 70),
 (3,2,"Chia - nasiona Bio 200g",9.90, 
 "Bio nasiona chia zwane inaczej szałwią hiszpańską,
 to bardzo bogate źródło błonnika, przeciwutleniaczy,
 kwasów Omega 3 i Omega 6 oraz najważniejszych witamin i minerałów.",
 "100% nasiona szałwii hiszpańskiej", 90 ),
 (4,1,"Jagody Goji - suszone owoce Bio 100g", 17.90,
 "Jagody Goji hodowane na ekologicznych plantacjach,
 to małe, czerwone owoce które posiadają wyjątkowe właściwości zdrowotne.
 Rosną na krzewie zwanym kolcowój pospolity lub kolcowój szkarłatny.
 Roślina rośnie głównie w Chinach, Tybecie oraz Mongolii." , 
 "100% jagodu goji bio suszone", 100),
 (5,3, "Orzechy włoskie 1kg",44.56,
 "Orzechy włoskie są bogatym źródłem błonnika. W 100 gramach zawierają go aż prawie 7 gram.
 Poprawiają stan włosów, skóry i paznokci, wspomagają układ nerwowy i układ krążenia,
 obniżają poziom złego cholesterolu itd.
 Orzechy włoskie mają pozytywny wpływ na każdy organ i układ w ciele człowieka.
 Co ważne w orzechach włoskich znajduje się dobra proporcja pomiędzy kwasami tłuszczowymi omega 3 i omega 6 (1:4).",
 "100% łuskane orzechy włoskie",  100),
 (6,2,"Siemię lniane 1kg", 11.00,
 "To bogate źródło nienasyconych kwasów tłuszczowych, które śmiało może konkurować pod tym względem z nasionami chia.
Zawarte w nim kwasy ALA obniżają poziom cholesterolu i trójglicerydów we krwi. Ma też sporo błonnika (3 g w łyżce).
Siemię jest najbogatszym źródłem lignanów, dzięki którym dobroczynnie wpływa na pracę jelit, przeciwdziała nowotworom,
chorobom serca i stanom zapalnym. Nasiona lnu obniżają poziom cukru we krwi u osób z cukrzycą typu 2.
Dostarczają też sporo wapnia – 400 mg na szklankę. Kisiel z siemienia lnianego działa osłaniająco na gardło,
 dlatego ma zbawienne działanie podczas infekcji.","Len ziarno 100%",80),
 (7,4,"Pasta z kurkumy z imbirem i pieprzem bezglutenowa BIO 160 g",26.85,
 " Ekologiczna pasta z kurkumy z imbirem i pieprzem do spożycia z napojami np. z mlekiem, jogurtem, sokiem pomidorowym.
 Wzbogaca smak zup, sosów, sałatek oraz ryżu.",
 "Woda 71%, kurkuma 27%, pieprz, imbir 1% ", 50),
 (8,4,"Krem daktylowo-kakaowy 200g BIO",16.00,
 "Krem na bazie daktyli z dodatkiem kakao. wyśmienicie smakuje jako dodatek do placuszków, naleśników, kanapek, ciast i innych wypieków.
 Stanowi zdrowy zamiennik dla tradycyjnych słodzonych smarowideł i kremów.","Daktyle 90%, kakao 10%.",40),
 (9,5,"Marchew świeża BIO 1kg",1.49,
 "Marchew to uniwersalne, popularne warzywo stanowiące podstawę tradycyjnej kuchni polskiej.
 Można ja spożywać w formie surowej jako jarzynkę czy sok lub jako gotowany dodatek do różnego typu dań.
 Marchewka to bogate źródlo witamin i minerałów.",
 "marchew 100%",70),
 (10,5,"Burak długi ćwikłowy świeży BIO 1kg", 4.99,
 "Burak, który zazwyczaj wydaje się niepozornym warzywem, jest bogatym źródłem składników mineralnych,
 takich jak magnez, potas, cynk, żelazo czy fosfor oraz dwóch mało znanych pierwiastków - cezu i rubidu.
 Skład buraka uzupełniony jest również witaminami z grupy B, w witaminy C, A, E, K, błonnik pokarmowy,
 przeciwutleniacze oraz kwas foliowy.
 Najwięcej składników odżywczych buraka znajduje się w wyciśniętym z nich soku,
 gdyż ugotowane buraki tracą większość składników odżywczych.","100% buraki",40),
 (11,1,"Morwa biała - suszone owoce 180g", 16.90, 
 "Morwa biała przynależy do rodziny morwowatych, dziko rośnie w Afryce, Ameryce Północnej,
 Ameryce Południowej, jak również na pacyficznych wyspach.
 Jej owoce od tysięcy lat wykorzystywane są w tradycyjnej medycynie ludowej.
 Po suszone owoce morwy sięgnąć powinny osoby, które pragną wspomóc proces odchudzania,
 jak również oczyszczania organizmu. Ponadto stosowane są one do wsparcia regulacji cholesterolu oraz poziomu cukru.
 Owoce polecane są również przy chorobach wrzodowych dwunastnicy i żołądka.",
 "100% Owoce morwy suszone", 70),
 (12,6,"Chlorella - mielona Bio 100g",26.90,
 "hlorella to bogate źródło witamin z grupy B (B1,B2,B6,B12), witaminy A, a także witaminy C.
 Dodatkowo dostarcza wiele składników odżywczych takich jak wapń, cynk, żelazo, różnego rodzaju tłuszcze, białka czy też błonnik.
 Ich właściwości wspierają organizm min. w walce z problemami skóry czy też niektórymi dolegliwościami zdrowotnymi.",
 "100% Bio chlorella (Chlorella pyrenoidosa) mielona", 40),
 (13,3,"Migdały całe 1kg", 37.90,
 "Migdały są jednym z najsmaczniejszych owoców bakalii.
 Są bardzo odżywcze. Zawierają naturalny błonnik, który korzystnie wpływa na pracę jelit.
 Są świetnym dodatkiem do ciast i deserów, oraz przekąską między posiłkami.",
 "100% migdały łuskane", 50),
 (14,3, "Orzechy macadamia 500g", 62.90, 
 "Orzeszki Makadamia są bogatym źródłem tłuszczów jednonienasyconych.
 Są również bogate w białko i zawierają wszystkie niezbędne aminokwasy
 Są również dobrym źródłem błonnika i zawierają przeciwutleniacze, w tym witaminę E i selen,
 a także inne składniki odżywcze.
 Dzięki wysokiej zawartości białka są często wybieraną przekąską dla sportowców.",
 "100% orzechy makadamia", 40),
 (15,2,"Pestki moreli - gorzkie Bio 350g", 39.90,
 "Jądra pestek moreli stanowią źródło minerałów, głównie magnezu.
 Zawierają też dużo witamin, np. A, E, B15, B6 i B1 i nienasyconych kwasów tłuszczowych.
 Zawarte w jądrach pestek moreli antyoksydanty, neutralizują szkodliwe działanie wolnych rodników,
 hamują oznaki przedwczesnego starzenia się organizmu, oraz pomagają w usuwaniu śluzu z organizmu.
 Pestki powinny być przechowywane w odpowiednich warunkach, najlepiej w opakowaniach
 chroniących przed utlenieniem i wilgocią, w suchym i ciemnym miejscu.",
 "100% jądra pestkek moreli",10),
 (16,1, "Aronia - suszone owoce 120g", 9.90,
 "Aronia pochodzi z Kanady i Stanów Zjednoczony, jednak dzisiaj jej plantacje znajdują się również w Polsce.
 Aronię zalicza się ją do rodziny różowatych, jej najcenniejsza częścią są owoce.
Suszony owoc aronii, który bogaty jest w witaminę P, witaminę C oraz witaminę E.
 W aronii wyróżnić można także wysoką zawartość antocyjanów oraz polifenoli.",
 "100% suszony owoc aronii",40),
 (17,6,"Spirulina hawajska - proszek 100g", 54.90,
 "Spirulina hawajska (z łac. Arthrospira platensis) - odmiana, słodkowodna - występująca w postaci proszku.
 Zalicza się do jednego z najbogatszych produktów zawierających beta karoten a także wyjątkowo dużą zawartość
 minerałów i mikroelementów.", 
 "100% proszek ze spiruliny hawajskiej", 20),
 (18,1, "Jagody Acai Liofilizowane Sproszkowane Bio 100 g", 46.99,
 "Ekologiczne sproszkowane jagody Acai to bardzo cenny i ciekawy dodatek do diety.
 Te niezwykłe owoce pochodzą z wilgotnych lasów amazońskich.
 Dzięki zastosowanej metodzie liofilizacji, gotowy produkt zachowuje pełnię składników odżywczych.
 Jagody charakteryzują się również wysoką zawartością polifenoli.",
 "Jagody Acai liofilizowane sproszkowane* 100% .",20),
 (19,2,"Czarnuszka nasiona 200g BIO", 10.99,
 "Czarnuszka siewna to roślina występująca naturalnie w Azji Zachodniej i Europie Południowo-Wschodniej.
 Te małe nasionka są bogactwem witamin i składników odżywczych.
 Znaleźć w nich można witaminy z grupy B, a także witaminę A, E, F.
 Oprócz tego czarnuszka posiada liczne związki mineralne, takie jak cynk, magnez, wapń, selen, żelazo i potas.", 
 "100% bio czarnuszka ziarno",10),
 (20,7," Olej kokosowy rafinowany bezzapachowy BIO 900ml", 23.99,
 "Olej kokosowy jest źródłem wielu dobroczynnych dla naszego organizmu składników odżywczych.
 Wśród wartości odżywczych należy zwróidcić szczególną uwagę na zawartość kwasów tłuszczowych:
nasyconych; jednonienasyconych; wielonienasyconych; tłuszczy trans.
 Ponadto olej kokosowy jest również źródło wapnia, żelaza, potasu, magnezu, fosforu,
 sodu oraz cynku, a także witaminy E, B2, B6, C i K. Jest to również źródło kwasu foliowego.",
 "100% ekologiczny olej kokosowy rafinowany",30);
 
insert into sklepik.stan_zamowienia (id,stan) values (2,"nowe"),(4,"spakowano"),(5,"wysłano"),(6,"zakończono");
insert into sklepik.stan_zamowienia (id,stan) values (3,"przyjęto do realizacji");
insert into sklepik.stan_zamowienia (id,stan) values (7,"anulowane");

insert into sklepik.metody_platnosci (metoda_platnosci) values ("Blik"),("przy odbiorze"),("PayPal"),("Przelew tradycyjny");

insert into sklepik.sposoby_dostawy (sposob_dostawy, cena ) values ("Paczka w punkcie DHL Parcelshop" , 9.99),
("Paczka w punkcie InPost Paczkomaty 24/7", 11.99),
("Kurier DHL" ,9.99),
("Kurier Inpost", 12.99);

insert into sklepik.kody_rabatowe (kod, znizka_procent) values ("Wiosna2022",3);
insert into sklepik.kody_rabatowe (kod, znizka_procent) values ("hejkanaklejka",10);
insert into sklepik.kody_rabatowe (kod, znizka_procent) values ("rabat",5);

insert into sklepik.uprawnienia_pracownikow (id,uprawnienia) values (1,"Obsluga sklepu"),(2,"Administracja");

insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (1, 'Bella Vista', '40-968', 'Schiller', 63, 3);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (2, 'Sharan', '02-478', 'Mariners Cove', 15, 21);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (3, 'Ornskoldsvik', '08-824', 'Armistice', 43, 78);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (4, 'Jutrosin', '35-500', 'Meadow Ridge', 27, 28);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (5, 'Hedao', '45-999', 'Sutteridge', 13, 60);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (6, 'Rosthern', '43-934', 'Heath', 20, 34);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (7, 'Caringin', '31-326', 'Norway Maple', 51, 32);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (8, 'Montepuez', '54-760', 'Oneill', 77, 46);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (9, 'Graz', '41-123', 'Myrtle', 75, 4);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (10, 'Xujia', '69-789', 'Old Shore', 95, 99);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (11, 'Bouillon', '63-052', 'Stang', 12, 59);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (12, 'Neos Mylotopos', '02-206', 'Lunder', 57, 37);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (13, 'Damulog', '70-777', 'Linden', 57, 20);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (14, 'Zlatni Pyasatsi', '73-880', 'Sundown', 17, 20);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (15, 'Ngudu', '96-096', 'Delladonna', 37, 55);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (16, 'Coro', '96-434', 'Sage', 67, 2);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (17, 'Saint-Pierre', '26-424', 'Brickson Park', 74, 39);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (18, 'Melun', '57-123', 'Gulseth', 80, 37);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (19, 'Pilluana', '98-432', 'Old Shore', 5, 96);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (20, 'Montélimar', '04-333', 'Basil', 47, 13);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (21, 'Wantian', '38-656', 'Marquette', 50, 25);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (22, 'Ivanivka', '64-567', 'Drewry', 47, 48);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (23, 'Idanha-a-Nova', '03-895', 'Thompson', 24, 81);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (24, 'Daji', '88-123', 'Jackson', 83, 100);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (25, 'Cachoeira do Sul', '04-089', 'Maywood', 53, 29);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (26, 'Dashi', '15-667', 'Warner', 67, 13);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (27, 'Banjar Triwangsakeliki', '41-988', 'Farmco', 86, 75);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (28, 'Artemisa', '78-887', 'John Wall', 72, 100);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (29, 'Qianjin', '07-098', 'Beilfuss', 91, 88);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (30, 'Ubatuba', '73-910', 'Mosinee', 6, 39);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (31, 'Pacos', '79-123', 'Anniversary', 73, 66);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (32, 'Mikhaylovka', '49-031', 'Dunning', 26, 28);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (33, 'Hitura', '26-938', 'Haas', 69, 15);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (34, 'Amu Gulang Baolige', '65-516', 'Eliot', 80, 35);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (35, 'Pertunmaa', '38-546', 'Express', 77, 82);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (36, 'Desa Nasol', '74-555', 'Kenwood', 85, 93);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (37, 'Haerlong', '76-521', 'Corben', 72, 59);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (38, 'Kabala', '90-557', 'Reinke', 32, 67);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (39, 'La Estrella', '21-239', 'Muir', 5, 64);
insert into sklepik.adresy (id, miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values (40, 'Hassleholm', '78-408', 'Loftsgordon', 82, 53);



insert into sklepik.pracownik (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu, id_uprawnienia, id_klienta) values (1, 'Misty', 'Whitney', 1, 'mwhitney0@weebly.com', 'asdf', '829963532', 2, null);

insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (1, 'Isadora', 'Vanyushin', 6, 'ivanyushin0@stumbleupon.com', 'lmO9suMrQjO', '894762954');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (2, 'Enos', 'Schohier', 7, 'eschohier1@moonfruit.com', '5WTNOT', '303837807');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (3, 'Eunice', 'Coad', 8, 'ecoad2@blinklist.com', 'mnAljo', '893580359');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (4, 'Wrennie', 'Pioch', 9, 'wpioch3@typepad.com', 'qInUSDFOkIo', '837909101');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (5, 'Chandal', 'Tripp', 10, 'ctripp4@people.com.cn', 'fpNwYG', '227318958');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (6, 'Kipper', 'Bryden', 11, 'kbryden5@hc360.com', '2aPbf7Fza', '731522961');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (7, 'Cliff', 'Gazzard', 12, 'cgazzard6@ning.com', 'HQbPbW6UE3Nf', '807409001');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (8, 'Karleen', 'Pennington', 13, 'kpennington7@joomla.org', 'vUEFRF6x', '612536996');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (9, 'Viole', 'Bottrill', 14, 'vbottrill8@mashable.com', 'kdxviGymZU8', '503712776');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (10, 'Joscelin', 'Trevena', 15, 'jtrevena9@auda.org.au', 'k4YRXSZSnGuf', '922782557');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (11, 'Eartha', 'Scurry', 16, 'escurrya@paginegialle.it', 'hH6Xmj0ws3', '101953381');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (12, 'Ike', 'Ranaghan', 17, 'iranaghanb@simplemachines.org', 'CVHAda1', '528610651');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (13, 'Hugibert', 'Colleymore', 18, 'hcolleymorec@ed.gov', 'D1T5dAKIGN', '971418882');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (14, 'Yovonnda', 'Yansons', 19, 'yyansonsd@github.com', '4re2SEzlQp7', '860200764');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (15, 'Collen', 'Lenton', 20, 'clentone@technorati.com', '1YmRRCa', '855323997');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (16, 'Ricca', 'Gogin', 21, 'rgoginf@ovh.net', 'PXbwkdv184', '595789270');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (17, 'Kelly', 'Hartus', 22, 'khartusg@buzzfeed.com', '4Z20oaTcF7PF', '993644312');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (18, 'Decca', 'Padilla', 23, 'dpadillah@cisco.com', '7HGIEv9fy7', '508969474');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (19, 'Pippa', 'Kingsnoad', 24, 'pkingsnoadi@parallels.com', 't6XioTCgW', '603160290');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (20, 'Tori', 'Elsip', 25, 'telsipj@npr.org', 'JvxEsMKn', '657201262');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (21, 'Dorris', 'Patley', 26, 'dpatleyk@imdb.com', 'EsyLXEv', '756613669');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (22, 'Zabrina', 'Guidera', 27, 'zguideral@twitpic.com', 'yrOj8yBchi', '681512060');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (23, 'Glyn', 'Demougeot', 28, 'gdemougeotm@cmu.edu', 'WKu4teKot', '321806535');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (24, 'Baron', 'Lipscomb', 29, 'blipscombn@sun.com', 'WHlriAQp', '899973046');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (25, 'Monti', 'Bronger', 30, 'mbrongero@squidoo.com', 'Zidkcse', '169213419');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (26, 'Gaven', 'Bonsall', 31, 'gbonsallp@mtv.com', 'eM59CJKqMJsw', '928833722');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (27, 'Amelia', 'Cawthra', 32, 'acawthraq@unblog.fr', 'OJ9pe3', '491383273');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (28, 'Sydel', 'Kiddye', 33, 'skiddyer@nationalgeographic.com', 'v0Zuc9L', '711024134');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (29, 'Xylina', 'Godney', 34, 'xgodneys@reference.com', 'EfRjYQ4', '859539663');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (30, 'Katy', 'Keunemann', 35, 'kkeunemannt@slate.com', 'yb2XyguSnm0', '925882853');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (31, 'Fiona', 'Micklewicz', 36, 'fmicklewiczu@fema.gov', 'OK5PtxfChr4', '840241381');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (32, 'Alexi', 'Ham', 37, 'ahamv@imdb.com', 'vjhqZfeS', '184575831');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (33, 'Marj', 'Blaisdell', 38, 'mblaisdellw@newyorker.com', 'P2sCWXN5h', '655577025');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (34, 'Clevey', 'Kaes', 39, 'ckaesx@ning.com', 'kMjEYHvwwszG', '311371535');
insert into sklepik.klient (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu) values (35, 'Tabatha', 'Heynen', 40, 'theyneny@networksolutions.com', 'tNw3U2vtHb0', '485709141');

insert into sklepik.pracownik (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu, id_uprawnienia, id_klienta) values (2, 'Homere', 'Charlton', 2, 'hcharlton1@reddit.com', 'asdf', '093089509', 1, 32);
insert into sklepik.pracownik (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu, id_uprawnienia, id_klienta) values (3, 'Keefe', 'Balm', 3, 'kbalm2@blogger.com', 'qwer', '911358696', 1, null);
insert into sklepik.pracownik (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu, id_uprawnienia, id_klienta) values (4, 'Reg', 'Eglise', 4, 'reglise3@fema.gov', 'rewq', '984703302', 1, 35);
insert into sklepik.pracownik (id, imie, nazwisko, id_adres, e_mail, haslo, numer_telefonu, id_uprawnienia, id_klienta) values (5, 'Antonetta', 'Scotsbrook', 5, 'ascotsbrook4@harvard.edu', 'iiii', '648376269', 2, null);




insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (1, 2, 4, 2, '2022-03-16', 7, 2, true, null, '2022-03-29');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (2, 33, 1, 3, '2022-03-29', 7, 2, false, null, '2022-04-20');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (3, 30, 3, 2, '2022-03-10', 2, 2, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (4, 32, 1, 1, '2022-03-21', 3, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (5, 28, 2, 4, '2022-05-05', 3, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (6, 6, 1, 2, '2022-03-10', 3, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (7, 17, 2, 1, '2022-05-08', 5, null, false, null, '2022-05-10');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (8, 2, 4, 2, '2022-03-03', 4, null, false, null, '2022-05-18');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (9, 23, 4, 4, '2022-03-18', 5, 2, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (10, 15, 2, 2, '2022-05-12', 7, 3, false, null, '2022-05-18');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (11, 26, 1, 4, '2022-03-17', 2, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (12, 23, 4, 2, '2022-05-07', 5, 3, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (13, 34, 4, 4, '2022-05-03', 7, null, false, null, '2022-05-09');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (14, 5, 2, 1, '2022-04-22', 4, 4, false, null, '2022-05-08');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (15, 31, 3, 3, '2022-05-20', 7, null, false, null, '2022-05-09');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (16, 24, 3, 1, '2022-04-22', 2, 4, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (17, 33, 3, 2, '2022-04-01', 6, 2, true, '2022-04-05', '2022-04-02');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (18, 22, 2, 4, '2022-04-12', 3, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (19, 28, 2, 1, '2022-05-13', 6, null, true, '2022-05-20', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (20, 28, 2, 3, '2022-04-03', 5, null, false, null, '2022-04-13');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (21, 23, 4, 4, '2022-03-19', 2, 3, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (22, 4, 2, 1, '2022-04-13', 5, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (23, 19, 1, 1, '2022-03-07', 3, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (24, 13, 1, 1, '2022-05-07', 5, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (25, 34, 3, 1, '2022-04-06', 2, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (26, 9, 3, 3, '2022-05-08', 6, null, true, '2022-05-15', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (27, 30, 4, 1, '2022-04-09', 5, null, true, null, '2022-03-11');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (28, 20, 1, 4, '2022-04-29', 5, 3, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (29, 23, 2, 2, '2022-03-04', 4, 2, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (30, 8, 3, 3, '2022-03-08', 3, 3, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (31, 7, 2, 1, '2022-03-29', 2, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (32, 30, 4, 1, '2022-03-08', 5, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (33, 21, 3, 1, '2022-03-16', 6, 3, true, '2022-03-30', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (34, 6, 4, 4, '2022-04-28', 2, null, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (35, 32, 2, 3, '2022-05-16', 3, null, true, null, '2022-03-09');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (36, 25, 3, 4, '2022-03-19', 5, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (37, 24, 1, 2, '2022-04-07', 7, 2, true, null, '2022-04-16');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (38, 31, 1, 3, '2022-05-13', 2, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (39, 4, 1, 3, '2022-04-20', 6, null, true, '2022-04-25', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (40, 29, 2, 1, '2022-04-20', 4, 2, true, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (41, 28, 3, 1, '2022-04-13', 2, 4, true, null, '2022-04-21');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (42, 35, 3, 1, '2022-05-07', 2, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (43, 1, 4, 1, '2022-03-01', 6, 4, true, '2022-03-08', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (44, 17, 2, 3, '2022-05-09', 4, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (45, 20, 3, 2, '2022-05-07', 6, null, true, '2022-05-27', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (46, 11, 4, 4, '2022-05-01', 3, 2, true, null, '2022-03-11');
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (47, 4, 2, 3, '2022-04-20', 2, null, false, null, null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (48, 10, 3, 1, '2022-03-24', 6, 3, true, '2022-03-29', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (49, 29, 1, 1, '2022-03-30', 6, 3, true, '2022-04-05', null);
insert into sklepik.zamowienie (id, id_klienta, id_dostawa, id_sposob_platnosci, data_zamowienia, id_stan, id_kod_rabatowy, czy_oplacone, data_zakonczenia, data_anulowania) values (50, 13, 2, 3, '2022-04-01', 6, null, true, '2022-04-08', null);

insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (51, 13, 1, 3);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (52, 30, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (53, 34, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (54, 20, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (55, 1, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (56, 35, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (57, 21, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (58, 21, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (59, 25, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (60, 21, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (61, 9, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (62, 30, 1, 3);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (63, 18, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (64, 8, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (65, 11, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (66, 10, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (67, 14, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (68, 28, 1, 4);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (69, 34, 1, null);
insert into sklepik.zamowienie (id, id_klienta, id_stan, id_kod_rabatowy) values (70, 9, 1, 4);

insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 48, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 44, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 36, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 33, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 25, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 23, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 7, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 3, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 5, 1, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 39, 1, 9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 47, 5, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 30, 1, 4.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 1, 1, 11.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (2, 27, 3, 22.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 50, 1, 62.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (18, 32, 2, 46.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (12, 11, 1, 26.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 8, 4, 4.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 39, 5, 4.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 22, 3, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 45, 5, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 41, 2, 11.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 20, 3, 62.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 34, 3, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (15, 40, 2, 39.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 4, 2, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (3, 28, 1, 9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 5, 2, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (11, 38, 4, 16.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (15, 30, 3, 39.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 11, 2, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (12, 15, 5, 26.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 13, 3, 4.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 6, 4, 9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (15, 39, 2, 39.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 42, 5, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 17, 5, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (2, 8, 4, 22.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 21, 1, 54.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 49, 2, 11.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 35, 4, 23.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 19, 3, 62.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 4, 4, 23.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 35, 3, 16.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (11, 12, 4, 16.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 39, 5, 10.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 34, 2, 62.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 21, 5, 11.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (9, 18, 5, 1.49);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (12, 15, 5, 26.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (9, 21, 2, 1.49);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (1, 21, 4, 13.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 8, 1, 16.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (11, 42, 3, 16.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (4, 29, 5, 17.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 26, 1, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (9, 50, 5, 1.49);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 31, 5, 9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 8, 4, 10.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (18, 24, 9, 46.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 18, 7, 10.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 20, 2, 10.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 2, 5, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 37, 6, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (15, 13, 3, 39.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 38, 8, 54.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (3, 1, 2,  9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 46, 4, 23.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 37, 6, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 12, 10, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 5, 8, 10.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (1, 45, 10, 13.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 14, 6, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 15, 7, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 22, 8, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 28, 8, 16.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (18, 10, 6, 46.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 29, 10, 37.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 2, 4, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (7, 30, 3, 26.85);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 22, 3, 10.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (11, 19, 10, 16.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 30, 7, 4.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (2, 8, 2, 22.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (2, 6, 7, 22.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 16, 6, 11.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 42, 1, 54.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (7, 47, 2, 26.85);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 11, 8, 23.99);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 10, 6, 16.00);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (15, 45, 10, 39.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 32, 10, 44.56);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (15, 47, 3, 39.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 43, 1, 9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 9, 5, 9.90);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (9, 49, 9, 1.49);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (7, 37, 1, 26.85);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 14, 10, 16.00);

insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 57, 1, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 66, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 69, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 57, 5, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 69, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (3, 70, 1, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 58, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (9, 61, 2, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 70, 9, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 53, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 65, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (3, 60, 10, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (7, 65, 7, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 66, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 56, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 59, 6, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (11, 62, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 51, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 62, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 55, 5, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 54, 8, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 62, 1, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (12, 60, 5, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (9, 56, 2, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 54, 6, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 55, 5, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (7, 62, 2, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 61, 6, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 59, 10, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 62, 7, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (19, 55, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (3, 70, 6, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 58, 3, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 66, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 63, 1, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 55, 1, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (17, 64, 9, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 51, 7, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (14, 67, 6, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 66, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (8, 67, 10, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (16, 55, 8, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 61, 2, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (6, 69, 7, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (13, 70, 6, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (1, 57, 9, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (1, 57, 10, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (5, 59, 1, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (10, 54, 4, null);
insert into sklepik.zamowione_produkty (id_produktu, id_zamowienia, ilosc, cena) values (20, 57, 6, null);


update sklepik.zamowienie set id_kod_rabatowy=1 where id in (select id from zamowienie where isnull(id_kod_rabatowy));

update zamowienie inner join (select zam_id , round(sum(koszt)+sposoby_dostawy.cena,2) as a from (select zamowienie.id as zam_id,id_dostawa ,round((zamowione_produkty.ilosc*zamowione_produkty.cena)-(zamowione_produkty.ilosc*zamowione_produkty.cena)*0.01*kody_rabatowe.znizka_procent,2)  as koszt
    from ((zamowione_produkty inner join zamowienie on zamowione_produkty.id_zamowienia=zamowienie.id  and zamowienie.id_stan!=1)
    inner join kody_rabatowe on zamowienie.id_kod_rabatowy=kody_rabatowe.id)) as pomm, sposoby_dostawy where pomm.id_dostawa=sposoby_dostawy.id  group by pomm.zam_id) as pom on pom.zam_id=zamowienie.id  set koszt_calkowity=pom.a;







 

