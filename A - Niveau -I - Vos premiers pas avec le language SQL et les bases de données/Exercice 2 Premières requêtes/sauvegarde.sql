SELECT*
FROM etudiant
ORDER BY date_naissance ASC;

SELECT*
FROM etudiant 
WHERE niveau LIKE 'M%';

SELECT*
FROM examen
WHERE code LIKE '002%'
ORDER BY matricule;

SELECT*
FROM examen 
WHERE code LIKE '%1' OR code LIKE '%2'
ORDER BY matricule;

SELECT matricule,CODE,note,(note*2) AS note_sur_40
FROM examen 
ORDER BY matricule,CODE ASC; 

SELECT AVG(note) AS moyenne_des_notes
FROM examen
WHERE CODE LIKE'%2';

SELECT COUNT(CODE) AS 'nbre d\examens'
FROM examen 
WHERE matricule LIKE '%e001';

SELECT COUNT(CODE) AS 'nbre_etudiants002'
FROM examen
WHERE CODE LIKE '%2';

SELECT AVG(note) AS 'moyenne_notes_matr 001'
FROM examen 
WHERE matricule LIKE '%e001';

SELECT matricule,COUNT(note) AS 'exam/étudiant'
FROM examen
GROUP BY matricule;

SELECT matricule, AVG(note) AS 'moy_par_etudiant'
FROM examen
GROUP BY matricule;

SELECT matricule, AVG(note) AS 'moy_etudiant'
FROM examen
GROUP BY matricule
HAVING AVG(note) >=15 ;


SELECT code,AVG(note) AS 'moyenne/cours'
FROM examen
GROUP BY CODE;


