#!/usr/bin/perl -w

use CGI ":standard";

sub error {
    print "Error - file could not be opened in display.pl <br/>";
    print end_html();
    exit(1);
}

$LOCK = 2;
$UNLOCK = 8;

print header();

open(SURVDAT, "<survdat.dat") or error();
flock(SURVDAT, $LOCK);
@surv_data = <SURVDAT>;
flock(SURVDAT, $UNLOCK);
close(SURVDAT);

print start_html(-style => {-src=>"../mystyle.css"});
print h2("Results of the Survey");

@col_titles = (" ", "ID", "NAME", "AGE", "GENDER", "EMAIL");
@rows = th(\@col_titles);

foreach $d(@surv_data){
	chomp($d);
	@data = split(/ /, $d);
	unshift(@data, checkbox(
					-name => "id", 
					-value => $data[0],
					));
	push(@rows, td(\@data));
}

print start_form(
        -method  => 'post',
        -action => '/cgi-bin/delete.pl');
	
print table({-border => "border"},
            caption("Survey Result"),
            Tr(\@rows),
           );
		   
print submit(
        -value  => 'Delete',
		);

print end_form(); 
print a({-href =>"../homework3-2.html"}, "Click to do survey again");
print "<br/>";
print a({-href => "http://validator.w3.org/check?uri=referer"}, 
			img({-src => "../images/valid-xhtml10.png",
				-alt => "Valid XHTML 1.0 Transitional",
				-height => "31", -width => "88",}));
print end_html();