select
client_number,
date,
COUNT(_) as nbr_items, (client_number _ count(\*)) as total
FROM reservation
group by date
ORDER BY nbr_items DESC;

- fichier twig.yaml varibale globale

gérer le diner et le déjeuner
