<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('nn', array (
  'validators' => 
  array (
    'This value should be false.' => 'Verdien skulle ha vore tom/nei.',
    'This value should be true.' => 'Verdien skulla ha vore satt/ja.',
    'This value should be of type {{ type }}.' => 'Verdien må vere av typen {{ type }}.',
    'This value should be blank.' => 'Verdien skal vere blank.',
    'The value you selected is not a valid choice.' => 'Verdien du valde er ikkje gyldig.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Du må gjere minst {{ limit }} val.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Du kan maksimalt gjere {{ limit }} val.',
    'One or more of the given values is invalid.' => 'Ein eller fleire av dei opplyste verdiane er ugyldige.',
    'This field was not expected.' => 'Dette feltet var ikke forventa.',
    'This field is missing.' => 'Dette feltet mangler.',
    'This value is not a valid date.' => 'Verdien er ikkje ein gyldig dato.',
    'This value is not a valid datetime.' => 'Verdien er ikkje ein gyldig dato og tid.',
    'This value is not a valid email address.' => 'Verdien er ikkje ei gyldig e-postadresse.',
    'The file could not be found.' => 'Fila er ikkje funnen.',
    'The file is not readable.' => 'Fila kan ikkje lesast.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Fila er for stor ({{ size }} {{ suffix }}). Maksimal storleik er {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Mime-typen av fila er ugyldig ({{ type }}). Tillatne mime-typar er {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Verdien må vere {{ limit }} eller mindre.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Verdien er for lang. Den må vere {{ limit }} bokstavar eller mindre.',
    'This value should be {{ limit }} or more.' => 'Verdien må vere {{ limit }} eller meir.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Verdien er for kort. Den må ha {{ limit }} teikn eller fleire.',
    'This value should not be blank.' => 'Verdien kan ikkje vere blank.',
    'This value should not be null.' => 'Verdien kan ikkje vere tom (null).',
    'This value should be null.' => 'Verdien må vere tom (null).',
    'This value is not valid.' => 'Verdien er ikkje gyldig.',
    'This value is not a valid time.' => 'Verdien er ikkje ei gyldig tidseining.',
    'This value is not a valid URL.' => 'Verdien er ikkje ein gyldig URL.',
    'The two values should be equal.' => 'Dei to verdiane må vere like.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Fila er for stor. Den maksimale storleiken er {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Fila er for stor.',
    'The file could not be uploaded.' => 'Fila kunne ikkje bli lasta opp.',
    'This value should be a valid number.' => 'Verdien må vere eit gyldig tal.',
    'This file is not a valid image.' => 'Fila er ikkje eit gyldig bilete.',
    'This is not a valid IP address.' => 'Dette er ikkje ei gyldig IP-adresse.',
    'This value is not a valid language.' => 'Verdien er ikkje eit gyldig språk.',
    'This value is not a valid locale.' => 'Verdien er ikkje ein gyldig lokalitet (språk/region).',
    'This value is not a valid country.' => 'Verdien er ikkje eit gyldig land.',
    'This value is already used.' => 'Verdien er allereie i bruk.',
    'The size of the image could not be detected.' => 'Storleiken på biletet kunne ikkje oppdagast.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Biletbreidda er for stor, ({{ width }} pikslar). Tillaten maksimumsbreidde er {{ max_width }} pikslar.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Biletbreidda er for liten, ({{ width }} pikslar). Forventa minimumsbreidde er {{ min_width }} pikslar.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Bilethøgda er for stor, ({{ height }} pikslar). Tillaten maksimumshøgde er {{ max_height }} pikslar.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Billethøgda er for låg, ({{ height }} pikslar). Forventa minimumshøgde er {{ min_height }} pikslar.',
    'This value should be the user\'s current password.' => 'Verdien må vere brukaren sitt noverande passord.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Verdien må vere nøyaktig {{ limit }} teikn.',
    'The file was only partially uploaded.' => 'Fila vart berre delvis lasta opp.',
    'No file was uploaded.' => 'Inga fil vart lasta opp.',
    'No temporary folder was configured in php.ini.' => 'Førebels mappe (tmp) er ikkje konfigurert i php.ini.',
    'Cannot write temporary file to disk.' => 'Kan ikkje skrive førebels fil til disk.',
    'A PHP extension caused the upload to fail.' => 'Ei PHP-udviding forårsaka feil under opplasting.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Denne samlinga må innehalde {{ limit }} element eller meir.|Denne samlinga må innehalde {{ limit }} element eller meir.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Denne samlinga må innehalde {{ limit }} element eller færre.|Denne samlinga må innehalde {{ limit }} element eller færre.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Denne samlinga må innehalde nøyaktig {{ limit }} element.|Denne samlinga må innehalde nøyaktig {{ limit }} element.',
    'Invalid card number.' => 'Ugyldig kortnummer.',
    'Unsupported card type or invalid card number.' => 'Korttypen er ikkje støtta, eller kortnummeret er ugyldig.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Dette er ikkje eit gyldig internasjonalt bankkontonummer (IBAN).',
    'This value is not a valid ISBN-10.' => 'Verdien er ikkje eit gyldig ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Verdien er ikkje eit gyldig ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Verdien er verken eit gyldig ISBN-10 eller eit gyldig ISBN-13.',
    'This value is not a valid ISSN.' => 'Verdien er ikkje eit gyldig ISSN.',
    'This value is not a valid currency.' => 'Verdien er ikkje ein gyldig valuta.',
    'This value should be equal to {{ compared_value }}.' => 'Verdien bør vera like med {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Verdien bør vera større enn {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Verdien bør vera større enn eller så med {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Verdien bør vera identisk med {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Verdien bør vera mindre enn {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Verdi bør vera mindre enn eller så med {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Verdi bør ikkje vera så med {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Dette verdi bør ikkje vera identisk med {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Bildetilhøvet er for stort ({{ ratio }}). Det tillatne maksimale tilhøvet er {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Bildetilhøvet er for lite ({{ ratio }}). Forventa minimikvot er {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Bildet er firkanta ({{ width }}x{{ height }}px). Fyrkantiga bilde er ikkje tillatne.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Bildet er liggande orientert ({{ width }}x{{ height }}px). Landskapsorienterade bilde er ikkje tillatne.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Bildet er porträttorienterad ({{ width }}x{{ height }}px). Porträttorienterade bilde er ikkje tillatne.',
    'An empty file is not allowed.' => 'Ein tom fil er ikkje tillaten.',
    'The host could not be resolved.' => 'Verdiar kunne ikkje løysast.',
    'This value does not match the expected {{ charset }} charset.' => 'Verdi stemmer ikkje med forventa {{ charset }} charset.',
    'This is not a valid Business Identifier Code (BIC).' => 'Dette er ikkje ein gyldig Business Identifier Code (BIC).',
    'Error' => 'Feil',
    'This is not a valid UUID.' => 'Dette er ikkje ein gyldig UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'Verdi bør vera eit multipel av {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'Denne Business Identifier Code (BIC) er ikkje kopla til IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'Verdi bør vera gyldig JSON.',
    'This collection should contain only unique elements.' => 'Denne samlinga bør berre innehalda unike element.',
    'This value should be positive.' => 'Verdi bør vera positivt.',
    'This value should be either positive or zero.' => 'Verdi bør vera enten positivt eller noll.',
    'This value should be negative.' => 'Verdi bør vera negativt.',
    'This value should be either negative or zero.' => 'Verdi bør vera negativt eller noll.',
    'This value is not a valid timezone.' => 'Verdi er ikkje ei gyldig tidssone.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'Det her passordet har lekt ut ved eit datainnbrot, det får ikkje nyttast. Nytt eit anna passord.',
    'This value should be between {{ min }} and {{ max }}.' => 'Dette verdi bør ligga mellom {{ min }} og {{ max }}.',
    'This value is not a valid hostname.' => 'Verdien er ikkje eit gyldig vertsnamn.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'Talet på element i denne samlinga bør vera eit multipel av {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'Verdien burde oppfylla minst ein av følgjande begränsningar:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Kvart element i denne samlinga bør oppfylla sine eigne begränsningar.',
    'This form should not contain extra fields.' => 'Feltgruppa må ikkje innehalde ekstra felt.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Fila du lasta opp var for stor. Last opp ei mindre fil.',
    'The CSRF token is invalid.' => 'CSRF-nøkkelen er ikkje gyldig.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Innlogginga har feila.',
    'Authentication credentials could not be found.' => 'Innloggingsinformasjonen vart ikkje funnen.',
    'Authentication request could not be processed due to a system problem.' => 'Innlogginga vart ikkje fullført på grunn av ein systemfeil.',
    'Invalid credentials.' => 'Ugyldig innloggingsinformasjon.',
    'Cookie has already been used by someone else.' => 'Informasjonskapselen er allereie brukt av ein annan brukar.',
    'Not privileged to request the resource.' => 'Du har ikkje åtgang til å be om denne ressursen.',
    'Invalid CSRF token.' => 'Ugyldig CSRF-teikn.',
    'No authentication provider found to support the authentication token.' => 'Fann ingen innloggingstilbydar som støttar dette innloggingsteiknet.',
    'No session available, it either timed out or cookies are not enabled.' => 'Ingen sesjon tilgjengeleg. Sesjonen er anten ikkje lenger gyldig, eller informasjonskapslar er ikke skrudd på i nettlesaren.',
    'No token could be found.' => 'Fann ingen innloggingsteikn.',
    'Username could not be found.' => 'Fann ikkje brukarnamnet.',
    'Account has expired.' => 'Brukarkontoen er utgjengen.',
    'Credentials have expired.' => 'Innloggingsinformasjonen er utgjengen.',
    'Account is disabled.' => 'Brukarkontoen er deaktivert.',
    'Account is locked.' => 'Brukarkontoen er sperra.',
  ),
));

$catalogueEn = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'This value should be false.' => 'This value should be false.',
    'This value should be true.' => 'This value should be true.',
    'This value should be of type {{ type }}.' => 'This value should be of type {{ type }}.',
    'This value should be blank.' => 'This value should be blank.',
    'The value you selected is not a valid choice.' => 'The value you selected is not a valid choice.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.',
    'One or more of the given values is invalid.' => 'One or more of the given values is invalid.',
    'This field was not expected.' => 'This field was not expected.',
    'This field is missing.' => 'This field is missing.',
    'This value is not a valid date.' => 'This value is not a valid date.',
    'This value is not a valid datetime.' => 'This value is not a valid datetime.',
    'This value is not a valid email address.' => 'This value is not a valid email address.',
    'The file could not be found.' => 'The file could not be found.',
    'The file is not readable.' => 'The file is not readable.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.',
    'This value should be {{ limit }} or less.' => 'This value should be {{ limit }} or less.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.',
    'This value should be {{ limit }} or more.' => 'This value should be {{ limit }} or more.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.',
    'This value should not be blank.' => 'This value should not be blank.',
    'This value should not be null.' => 'This value should not be null.',
    'This value should be null.' => 'This value should be null.',
    'This value is not valid.' => 'This value is not valid.',
    'This value is not a valid time.' => 'This value is not a valid time.',
    'This value is not a valid URL.' => 'This value is not a valid URL.',
    'The two values should be equal.' => 'The two values should be equal.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'The file is too large.',
    'The file could not be uploaded.' => 'The file could not be uploaded.',
    'This value should be a valid number.' => 'This value should be a valid number.',
    'This file is not a valid image.' => 'This file is not a valid image.',
    'This is not a valid IP address.' => 'This is not a valid IP address.',
    'This value is not a valid language.' => 'This value is not a valid language.',
    'This value is not a valid locale.' => 'This value is not a valid locale.',
    'This value is not a valid country.' => 'This value is not a valid country.',
    'This value is already used.' => 'This value is already used.',
    'The size of the image could not be detected.' => 'The size of the image could not be detected.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'This value should be the user\'s current password.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.',
    'The file was only partially uploaded.' => 'The file was only partially uploaded.',
    'No file was uploaded.' => 'No file was uploaded.',
    'No temporary folder was configured in php.ini.' => 'No temporary folder was configured in php.ini, or the configured folder does not exist.',
    'Cannot write temporary file to disk.' => 'Cannot write temporary file to disk.',
    'A PHP extension caused the upload to fail.' => 'A PHP extension caused the upload to fail.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.',
    'Invalid card number.' => 'Invalid card number.',
    'Unsupported card type or invalid card number.' => 'Unsupported card type or invalid card number.',
    'This is not a valid International Bank Account Number (IBAN).' => 'This is not a valid International Bank Account Number (IBAN).',
    'This value is not a valid ISBN-10.' => 'This value is not a valid ISBN-10.',
    'This value is not a valid ISBN-13.' => 'This value is not a valid ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'This value is neither a valid ISBN-10 nor a valid ISBN-13.',
    'This value is not a valid ISSN.' => 'This value is not a valid ISSN.',
    'This value is not a valid currency.' => 'This value is not a valid currency.',
    'This value should be equal to {{ compared_value }}.' => 'This value should be equal to {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'This value should be greater than {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'This value should be greater than or equal to {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should be identical to {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'This value should be less than {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'This value should be less than or equal to {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'This value should not be equal to {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.',
    'An empty file is not allowed.' => 'An empty file is not allowed.',
    'The host could not be resolved.' => 'The host could not be resolved.',
    'This value does not match the expected {{ charset }} charset.' => 'This value does not match the expected {{ charset }} charset.',
    'This is not a valid Business Identifier Code (BIC).' => 'This is not a valid Business Identifier Code (BIC).',
    'Error' => 'Error',
    'This is not a valid UUID.' => 'This is not a valid UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'This value should be a multiple of {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'This value should be valid JSON.',
    'This collection should contain only unique elements.' => 'This collection should contain only unique elements.',
    'This value should be positive.' => 'This value should be positive.',
    'This value should be either positive or zero.' => 'This value should be either positive or zero.',
    'This value should be negative.' => 'This value should be negative.',
    'This value should be either negative or zero.' => 'This value should be either negative or zero.',
    'This value is not a valid timezone.' => 'This value is not a valid timezone.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'This password has been leaked in a data breach, it must not be used. Please use another password.',
    'This value should be between {{ min }} and {{ max }}.' => 'This value should be between {{ min }} and {{ max }}.',
    'This value is not a valid hostname.' => 'This value is not a valid hostname.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'The number of elements in this collection should be a multiple of {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'This value should satisfy at least one of the following constraints:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Each element of this collection should satisfy its own set of constraints.',
    'This form should not contain extra fields.' => 'This form should not contain extra fields.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'The uploaded file was too large. Please try to upload a smaller file.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'The CSRF token is invalid. Please try to resubmit the form.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'An authentication exception occurred.',
    'Authentication credentials could not be found.' => 'Authentication credentials could not be found.',
    'Authentication request could not be processed due to a system problem.' => 'Authentication request could not be processed due to a system problem.',
    'Invalid credentials.' => 'Invalid credentials.',
    'Cookie has already been used by someone else.' => 'Cookie has already been used by someone else.',
    'Not privileged to request the resource.' => 'Not privileged to request the resource.',
    'Invalid CSRF token.' => 'Invalid CSRF token.',
    'No authentication provider found to support the authentication token.' => 'No authentication provider found to support the authentication token.',
    'No session available, it either timed out or cookies are not enabled.' => 'No session available, it either timed out or cookies are not enabled.',
    'No token could be found.' => 'No token could be found.',
    'Username could not be found.' => 'Username could not be found.',
    'Account has expired.' => 'Account has expired.',
    'Credentials have expired.' => 'Credentials have expired.',
    'Account is disabled.' => 'Account is disabled.',
    'Account is locked.' => 'Account is locked.',
  ),
  'EasyAdminBundle' => 
  array (
    'new.page_title' => 'Create %entity_label%',
    'show.page_title' => '%entity_label% (#%entity_id%)',
    'edit.page_title' => 'Edit %entity_label% (#%entity_id%)',
    'list.page_title' => '%entity_label%',
    'search.page_title' => '{0} No results found|{1} <strong>1</strong> result found|]1,Inf] <strong>%count%</strong> results found',
    'search.no_results' => 'No results found.',
    'list.row_actions' => 'Actions',
    'paginator.first' => 'First',
    'paginator.previous' => 'Previous',
    'paginator.next' => 'Next',
    'paginator.last' => 'Last',
    'paginator.counter' => '<strong>%start%</strong> - <strong>%end%</strong> of <strong>%results%</strong>',
    'paginator.results' => '{0} No results|{1} <strong>1</strong> result|]1,Inf] <strong>%count%</strong> results',
    'label.true' => 'Yes',
    'label.false' => 'No',
    'label.empty' => 'Empty',
    'label.null' => 'Null',
    'label.nullable_field' => 'Leave empty',
    'label.object' => 'PHP Object',
    'label.inaccessible' => 'Inaccessible',
    'label.inaccessible.explanation' => 'Getter method does not exist for this field or the property is not public',
    'label.form.empty_value' => 'None',
    'user.logged_in_as' => 'Logged in as',
    'user.unnamed' => 'Unnamed User',
    'user.anonymous' => 'Anonymous User',
    'user.signout' => 'Sign out',
    'user.exit_impersonation' => 'Exit impersonation',
    'delete_modal.title' => 'Do you really want to delete this item?',
    'delete_modal.content' => 'There is no undo for this operation.',
    'delete_modal.action' => 'Delete',
    'batch_action_modal.title' => 'You are going to apply the "%action_name%" action to %num_items% item(s).',
    'batch_action_modal.content' => 'You can\'t undo this action.',
    'action.add_new_item' => 'Add a new item',
    'action.remove_item' => 'Remove the item',
    'action.choose_file' => 'Choose file',
    'errors' => 'Error|Errors',
    'form.are_you_sure' => 'You haven\'t saved the changes made on this form.',
    'form.tab.error_badge_title' => 'One invalid input|%count% invalid inputs',
    'show.remaining_items' => '{1} there is another item not displayed in this listing|]1,Inf] %count% other items are not displayed in this listing',
    'exception.entity_not_found' => 'This item is no longer available.',
    'exception.entity_remove' => 'This item can\'t be deleted because other items depend on it.',
    'exception.forbidden_action' => 'The requested action can\'t be performed on this item.',
    'exception.no_entities_configured' => 'The application is not properly configured.',
    'exception.undefined_entity' => 'The application is not properly configured for this kind of items.',
    'exception.no_permission' => 'You don\'t have enough permissions to do this.',
    'login.username' => 'Username',
    'login.password' => 'Password',
    'login.sign_in' => 'Sign in',
    'filter.title' => 'Filters',
    'filter.button.clear' => 'Clear',
    'filter.button.apply' => 'Apply',
    'filter.label.is_equal_to' => 'is equal to',
    'filter.label.is_not_equal_to' => 'is not equal to',
    'filter.label.is_greater_than' => 'is greater than',
    'filter.label.is_greater_than_or_equal_to' => 'is greater than or equal to',
    'filter.label.is_less_than' => 'is less than',
    'filter.label.is_less_than_or_equal_to' => 'is less than or equal to',
    'filter.label.is_between' => 'is between',
    'filter.label.contains' => 'contains',
    'filter.label.not_contains' => 'doesn\'t contain',
    'filter.label.starts_with' => 'starts with',
    'filter.label.ends_with' => 'ends with',
    'filter.label.exactly' => 'exactly',
    'filter.label.not_exactly' => 'not exactly',
    'filter.label.is_same' => 'is same',
    'filter.label.is_not_same' => 'is not same',
    'filter.label.is_after' => 'is after',
    'filter.label.is_after_or_same' => 'is after or same',
    'filter.label.is_before' => 'is before',
    'filter.label.is_before_or_same' => 'is before or same',
    'security.list.hidden_results' => 'Some results can\'t be displayed because you don\'t have enough permissions',
  ),
  'messages' => 
  array (
    'action.new' => 'Add %entity_label%',
    'action.show' => 'Show',
    'action.edit' => 'Edit',
    'action.search' => 'Search',
    'action.delete' => 'Delete',
    'action.save' => 'Save changes',
    'action.continue' => 'Continue',
    'action.cancel' => 'Cancel',
    'action.list' => 'Back to listing',
    'action.deselect' => 'Deselect',
    'label.form.empty_value' => 'None',
    '__name__label__' => '__name__label__',
  ),
));
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
