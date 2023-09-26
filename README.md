# PHP-registration-form-in-OOP
Simple task to refactoring of registration form to PHP8 using OOP. 

### Conditions:
- data are stored in file
- submited data from form are validated - name and surname must be fill, pass is equal to pass2 and is not empty
- there is "antispam" question 0+0 = - Im not generating numbers, Im using it as it is
- if everything is ok, it shows user data - Im not showing original password (obviously)

### My goal of this task:
- refactor one-file script to OOP without any framework

### Description
- using PHP8, OOP
- Dependecy Injection, DTO, Factory ...
- using php attributes for validation of DTO - using similar asserts
- make code scalable and testable
- using composer for autoload
