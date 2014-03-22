#!/usr/bin/perl -w

use CGI ":standard";

sub error {
    print "Error - file could not be opened in delete.pl <br/>";
    print end_html();
    exit(1);
}

$LOCK = 2;
$UNLOCK = 8;

my(@ids) = (param("id"));

print header();

open(SURVDAT, "<survdat.dat") or error();
flock(SURVDAT, $LOCK);
@surv_data = <SURVDAT>;
flock(SURVDAT, $UNLOCK);
close(SURVDAT);

open(SURVDAT, ">survdat.dat") or error();
flock(SURVDAT, $LOCK);
open(IDDAT, "<survid.dat") or error();
flock(IDDAT, $LOCK);
@safe_id = <IDDAT>;
flock(IDDAT, $UNLOCK);
close(IDDAT);
foreach $d(@surv_data){
	chomp($d);
	@data = split(/ /, $d);
	$flag = 1;
	MATCH:{
		foreach $id(@ids){
			if ($data[0] eq $id){
				$flag = 0;
				last MATCH;
			}
		}
	}
	if ($flag){
		print SURVDAT "@data"."\n";
	}else{
		unshift(@safe_id, $data[0]);
	}
}
open(IDDAT, ">survid.dat") or error();
flock(IDDAT, $LOCK);
print IDDAT "@safe_id";
flock(IDDAT, $UNLOCK);
close(IDDAT);
flock(SURVDAT, $UNLOCK);
close(SURVDAT);

print start_html(-style => {-src=>"../mystyle.css"});
print h1("Delete Comlete!");
print a({-href =>"display.pl",}, "Return to see result!");
print "<br/>";
print a({-href => "http://validator.w3.org/check?uri=referer"}, 
			img({-src => "../images/valid-xhtml10.png",
				-alt => "Valid XHTML 1.0 Transitional",
				-height => "31", -width => "88",}));
print end_html();