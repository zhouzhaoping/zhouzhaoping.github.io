#!/usr/bin/perl -w

use CGI ":standard";

$LOCK = 2;
$UNLOCK = 8;

sub error {
	print "Error file could not be opened in collect.pl <br/>";
	print end_html();
	exit(1);
}

sub getId{
	open(IDDAT, "<survid.dat") or error();
	flock(IDDAT, $LOCK);
	@line = <IDDAT>;
	@safe_id = split / /, $line[0];
	$n = @safe_id;
	flock(IDDAT, $UNLOCK);
	close(IDDAT);
	
	$reid = $safe_id[0];
	open(IDDAT, ">survid.dat") or error();
	flock(IDDAT, $LOCK);
	if ($n == 1){
		print IDDAT $safe_id[0] + 1;
	}else{
		shift(@safe_id);
		print IDDAT "@safe_id";
	}
	flock(IDDAT, $UNLOCK);
	close(IDDAT);
	
	$reid;
}

my($name, $age, $gender, $email) = (param("name"), param("age"), param("gender"), param("email"));

print header();

open(SURVDAT, ">>survdat.dat") or error();
flock(SURVDAT, $LOCK);

$id = &getId;
chomp($id);
print SURVDAT "$id $name $age $gender $email\n";

flock(SURVDAT, $UNLOCK);
close(SURVDAT);

print start_html(-style => {-src=>"../mystyle.css"});
print h1("Thank you!");
print "id:$id<br/>name:$name<br/>age:$age<br/>gender:$gender<br/>email:$email<br/>";
print a({-href =>"display.pl"}, "To see the results, click here");
print "<br/>";
print a({-href =>"../homework3-2.html"}, "To do survey again, click here");
print "<br/>";
print a({-href => "http://validator.w3.org/check?uri=referer"}, 
			img({-src => "../images/valid-xhtml10.png",
				-alt => "Valid XHTML 1.0 Transitional",
				-height => "31", -width => "88",}));
print end_html();
