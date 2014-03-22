open(SURVDAT, "<survdat.dat") or error();
flock(SURVDAT, $LOCK);
@surv_data = <SURVDAT>;
flock(SURVDAT, $UNLOCK);

$n = 1;
@rows;
foreach $d(@surv_data){
	chomp($d);
	@data = split(/ /, $d);
	print $data[0];
	print "\n";
	push(@rows, [@data]);
}

foreach $d(@rows)
{
	print "data $n: ";
	foreach $h(@{$d})
	{
		print $h;
	}
	print "\n";
}