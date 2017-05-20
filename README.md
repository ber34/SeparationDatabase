# Separation Database Queries OOP
Separation Database Queries

Sepearation database queries, jest to koncepcja odseparowania zapytań do bazy danych od kodu źródłowego programu. Same zapytania do bazy danych odbywają się w tradycyjny sposób za pomącą PDO. Koncepcja polega na wytworzeniu większej przejrzystości kodu i łatwiejszego dostępu do zapytań w celu ułatwienia zmieniania ich w późniejszej fazie rozwoju programu. Zastosowano tutaj Traits z PHP 5.4 Które jest dołączane do klasy samego zapytania. W traits jest przetwarzane całe zapytanie i wysyłane do bazy danych z klasy znajdującego się samego zapytania. Pozbywamy się w ten sposób zbędnej ilości kodu przez dołączanie traits do każdej klasy zapytań. Ruch zapytań odbywa się w szybszy sposób.

EN

Sepearation database queries, is the concept of separating database queries from the source code of the program. Same database queries are held in the traditional way by the PDO. The concept is to produce more code transparency and easier access to queries to facilitate their later development. Here are the Traits from PHP 5.4 that are included with the query class itself. In the traits is processed the whole query and sent to the database of the class of the same query. We get rid of unnecessary code by attaching traits to each query class. Query traffic is faster.
