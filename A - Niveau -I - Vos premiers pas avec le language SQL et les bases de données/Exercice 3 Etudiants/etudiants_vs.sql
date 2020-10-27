-- 1. Afficher la liste des étudiants triés par ordre croissant de date de naissance.
SELECT*
FROM etudiant
ORDER BY date_naissance ASC; /* ORDER BY permet de trier les lignes dans une requête SQL. Elle permet d'afficher
 la requette demandée. Par défaut il sont trier par ordre ascendant mais ASC permet aussi de le faire et de ne pas l'oublier */

--  2. Afficher tous les étudiants inscrits à M1 et tous les étudiants inscrits à M2.
SELECT*
FROM etudiant 
WHERE niveau LIKE 'M%';

-- 3. Afficher les matricules des étudiants qui ont passé l'examen du cours 002.
SELECT*
FROM examen
WHERE code LIKE '002%'
ORDER BY matricule;
-/*4. Afficher les matricules de tous les étudiants qui ont passé l'examen du cours 001 et
de tous les étudiants qui ont passé l'examen du cours 002.*/

SELECT*
FROM examen 
WHERE code LIKE '%1' OR code LIKE '%2'
ORDER BY matricule;

/*5. Afficher le matricule, code, note /20 et note /40 de tous les examens classés par
ordre croissant de matricule et de code.*/

SELECT matricule,CODE,note,(note*2) AS note_sur_40
FROM examen 
ORDER BY matricule,CODE asc; 


-- 6. Trouver la moyenne de notes de cours 002.
SELECT AVG(note) AS moyenne_des_notes /* Ici on selectionnes la moyenne dans la colonnes notes à laquelle j'assigne un alias "AS" pour rénommer la colonne  */
FROM examen
WHERE CODE LIKE'%2';

-- 7. Compter les examens passés par un étudiant (exemple avec matricule 'e001')

SELECT COUNT(CODE) AS 'nbre d\examens'
FROM examen 
WHERE matricule LIKE '%e001';


-- 8. Compter le nombre d'étudiants qui ont passé l'examen du cours 002.

SELECT COUNT(CODE) AS 'nbre_etudiants002'
FROM examen
WHERE CODE LIKE '%2';

-- 9. Calculer la moyenne des notes d'un étudiant (exemple avec matricule 'e001'). 

SELECT AVG(note) AS 'moyenne_notes_matr 001'
FROM examen 
WHERE matricule LIKE '%e001';

-- 10. Compter les examens passés par chaque étudiant.
SELECT matricule,COUNT(note) AS 'exam/étudiant'
FROM examen
GROUP BY matricule;


-- 11. Calculer la moyenne des notes pour chaque étudiant.

SELECT matricule, AVG(note) AS 'moy_par_etudiant'
FROM examen
GROUP BY matricule;


/*12. Même question, mais afficher seulement les étudiants (et leurs moyennes) dont la
moyenne est >= 15.*/


SELECT matricule, AVG(note) AS 'moy_etudiant'
FROM examen
GROUP BY matricule
HAVING AVG(note) >=15 ;



-- 13. Trouver la moyenne de notes de chaque cours.


SELECT code,AVG(note) AS 'moyenne/cours'
FROM examen
GROUP BY CODE;