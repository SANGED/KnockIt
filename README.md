# KnockIt

A simple remote API to empty/delete safely a distant project :-) More in description...

## Getting Started

Hiii, heuuuh, have you ever come to work on a project and that in the end you do not get paid or you get ejected from the project unfairly?<br>
Here is a solution to this, a small API, which can on demand, empty or delete all the files that you specify of a remote project with a query string given

### Prerequisites

Less PHP skills


### Installing

Just put the Ki.php and Ki at the "/" root of the project<br>
/Theproject<br>
  ----/models<br>
  ----/views<br>
  ----/controllers<br>
  ----/css<br>
  ----/js<br>
  ----/img<br>
  Ki<br>
  Ki.php<br>
  index.php<br>
  .httaccess<br>

## Running the tests
Now you just have to hit the URL in a browser or by a client, with your secret Key, you configured before, so that Ki will recognize you and do the action<br>

<pre>'Theproject.com/Ki.php?action=delete&targetfolder=css&again=js&key=SanixDarker'</pre>

### Break down into end to end tests

It's coul return "Done" as your wishes!

## Built In
* [PHP] still working on it
* [NODEJS] still working on it

## Authors

* **Sanix Darker** - *Initial work* - [KnockIt](https://github.com/KnockIt)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc

