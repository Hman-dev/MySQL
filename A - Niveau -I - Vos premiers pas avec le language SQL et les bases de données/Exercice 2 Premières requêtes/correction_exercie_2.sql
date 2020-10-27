SELECT*
FROM villes_france_free
LEFT JOIN departement ON departement_code = ville_departement
ORDER BY ville_population_2012 DESC 
LIMIT 10 ;

SELECT departement_nom, ville_departement, COUNT(*)AS nbr_items 
FROM villes_france_free
LEFT JOIN departement ON departement_code = ville_departement 
GROUP BY ville_departement
ORDER BY nbr_items DESC;

SELECT departement_code, ville_departement,SUM(ville_surface) AS superficie
FROM villes_france_free
LEFT JOIN departement ON departement_code = ville_departement
GROUP BY ville_departement
ORDER BY superficie DESC
LIMIT 10; 

SELECT COUNT(*)
FROM villes_france_free
WHERE ville_nom LIKE 'Saint%';

SELECT ville_nom,COUNT(*) AS nbt_item
FROM villes_france_free
GROUP BY ville_nom
ORDER BY nbt_item DESC;

/* question 9  */
SELECT*
FROM villes_france_free
WHERE ville_surface >(SELECT AVG(ville_surface)
FROM villes_france_free);

/* question 10 */
SELECT ville_departement,SUM(ville_population_2012) AS population_2012
FROM villes_france_free
GROUP BY ville_departement
HAVING population_2012 > 2000000
ORDER BY population_2012 DESC;