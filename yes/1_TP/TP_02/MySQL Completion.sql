select * from etudiants 

select count(*) as 'nbrEtudiants' from etudiants

select count(*) as '1TL1' from etudiants where Classe='1TL1'

select distinct Classe from etudiants

select distinct Classe as 'classe', count(distinct Matricule) as 'nbr' from etudiants group by Classe

select distinct left(Classe,2) as 'AnSec', count(distinct Matricule) as 'nbr' from etudiants group by left(Classe, 2)

select distinct left(right(Classe, 3), 1) as 'Sec', count(distinct Matricule) as 'nbr' from etudiants group by left(right(Classe, 3), 1)

select distinct Prenom as 'Prénom', count(*) as 'nbr' from etudiants group by Prenom

select MAX(nbr) as 'max' from (select count(*) as 'nbr' from etudiants group by Prenom) as max

select prenom as 'prenom' 
	from (select Prenom as 'prenom', count(*) as 'nbr' from etudiants group by Prenom) as liste
    where nbr=
		(select MAX(nbr) as 'maxi' from 
			(select Prenom as 'prenom', count(*) as 'nbr' from etudiants group by Prenom) as liste
		)
 
select Nom as 'nom', Prenom as 'prenom', count(*) as 'nbr' from etudiants group by Nom, Prenom having nbr>1

select Nom as 'nom', Prenom as 'prenom', count(*) as 'nbr' from etudiants_2 group by Nom, Prenom having nbr>1

select Classe as 'Classe', Matricule as 'Matricule', etu.Nom as 'Nom', etu.Prenom as 'Prenom' from (
	select Nom as 'nom', Prenom as 'prenom', count(*) as 'nbr' from etudiants group by Nom, Prenom having count(*)>1
    ) as tab, etudiants as etu
    where etu.Nom=tab.nom && etu.Prenom=tab.prenom
    
select Classe as 'Classe', Matricule as 'Matricule', etu.Nom as 'Nom', etu.Prenom as 'Prenom' from (
	select Nom as 'nom', Prenom as 'prenom', count(*) as 'nbr' from etudiants_2 group by Nom, Prenom having count(*)>1
    ) as tab, etudiants_2 as etu
    where etu.Nom=tab.nom && etu.Prenom=tab.prenom
    
show tables

show columns from etudiants

use test

use minicampus

use world

show tables

show columns from city

select * from country
select * from city
select * from countrylanguage
select max(SurfaceArea) as laPlusGrande from country

select Name, min(SurfaceArea) as laPlusPetiteSuperf from country

select Name as benelux, sum(SurfaceArea) as surface 
from country where Name='Belgium' OR Name='Netherlands' OR Name='Luxembourg'

select co.Name as pays, co.Population as popuPays, sum(ci.Population) as popuVilles
	from country as co
		JOIN city as ci
			ON co.Code=ci.CountryCode
	where co.Name='Belgium' OR co.Name='Netherlands' OR co.Name='Luxembourg' 
    group by co.Name
	
select col.Language as language, col.Percentage as pct
	from countrylanguage as col
		join country as co 
			on col.CountryCode=co.Code
	where co.Name='Belgium' OR co.Name='Netherlands' OR co.Name='Luxembourg'
    group by col.Percentage DESC
    
select avg(Percentage) as langueOfficielle
	from countrylanguage
    where isOfficial='T'
    
use minicampus

select * from cours
select id, nom, parent_id, niveau
	from class
    where parent_id is null
    
select nom as 'nomFilles(TI)'
	from class
    where parent_id is not null
		and nom like '_T'
        
select nom as 'nomFilles(TI)'
	from class
    where parent_id is not null
		and nom like '_T__'		-> Ne sait pas utiliser [!12]
        
select code, faculte, intitule
	from cours
    where faculte like '1T'
    
use world

select * from countrylanguage

select Region, sum(SurfaceArea)
	from country
    where Region like '%Europe'
    group by Region
    
select Name as name, tabHelp.Continent, tabHelp.IndepYear
	from country, 
    (select Continent, max(IndepYear) as IndepYear
		from country
        group by Continent) as tabHelp
	where country.IndepYear=tabHelp.IndepYear
		AND country.Continent=tabHelp.Continent
    group by name
    
select sum(Percentage) as '%_langueOfficiel'
	from countrylanguage
    where IsOfficial like 'F'
    
select * from user