

SELECT COUNT(NomS) AS 'Nbre stagiaires(r ou s)'
FROM stagiaires
WHERE NomS LIKE '%e%' OR Noms LIKE '%s%';

SELECT NumS , MAX(Note)
FROM passerexamen
GROUP BY NumS;



SELECT Date,COUNT(TypeE) AS 'nbre d\examens/date'
FROM examens
GROUP BY DATE;


SELECT Salle, COUNT(TypeE) AS 'Nbre d\examens/Salle'
FROM examens 
GROUP BY Salle;

SELECT Salle, COUNT(TypeE) AS 'Examens/salleA1'
FROM examens
WHERE Salle= 'A1';

SELECT Salle, COUNT(TypeE) 
FROM examens
GROUP BY salle
HAVING COUNT(TypeE) >= 2;

SELECT Salle, COUNT(TypeE) 
FROM examens
GROUP BY salle
HAVING COUNT(TypeE) >= 3;

SELECT COUNT(TypeE) AS 'nbre examens/salle A'
FROM examens 
WHERE Salle LIKE 'A%';

SELECT Salle,COUNT(TypeE) AS 'Nbre_examens/salleA'
FROM examens 
WHERE Salle LIKE 'A%'
GROUP BY Salle;

SELECT Salle,COUNT(TypeE) AS 'Nbre_examens>2/salleA'
FROM examens 
WHERE Salle LIKE 'A%'
GROUP BY Salle
HAVING COUNT(TypeE) >= 2;
`exo 1 niveau 2(phpet sql)`