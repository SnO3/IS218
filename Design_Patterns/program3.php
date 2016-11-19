
<?php

class SongQuoteDecorator
{
	protected $song;
	protected $quote;

	public function __construct(Song $s)
	{
		$this->song = $s;
		$this->resetQuote();
	}

	public function resetQuote()
	{
		$this->quote = $this->song->getQuote();
	}

	public function showQuote()
	{
		return $this->quote;
	}
}

class SongQuoteFormattedDecorator extends SongQuoteDecorator
{
	private $sqd;

	public function __construct(SongQuoteDecorator $sqd_in)
	{
		$this->sqd = $sqd_in;
	}

	public function formatQuote()
	{
		$this->sqd->quote = '"' . $this->sqd->quote . '" - ' . $this->sqd->song->getComposer() . ', ' . $this->sqd->song->getTitle();
	}
}

class SongAdapter
{
	private $song;

	public function __construct($s)
	{
		$this->song = $s;
	}

	public function getTitleComposer()
	{
		return $this->song->getTitle() . ' by ' . $this->song->getComposer();
	}
}

class Song
{
	private $title;
	private $composer;
	private $quote;

	public function __construct($t, $c, $q)
	{
		$this->title    = $t;
		$this->composer = $c;
		$this->quote    = $q;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getComposer()
	{
		return $this->composer;
	}

	public function getQuote()
	{
		return $this->quote;
	}
}

class SongList
{
	private $songs = array();
	private $songCount = 0;

	public function __construct(){}

	public function getSongCount()
	{
		return $this->songCount;
	}

	public function getSong($index)
	{
		if($index > -1 && $index <= $this->songCount)
		{
			return $this->songs[$index];
		} else
		{
			return NULL;
		}
	}

	public function addSong($newSong)
	{
		$this->songCount++;
		array_push($this->songs, $newSong);
	}

	public function removeSong($index)
	{
		if( $index >= 0 && $index <= $this->songCount )
		{
			array_splice( $this->songs, $index, -1*(count($this->songs) - ($index+1)) );
		} else
		{
			return NULL;
		}

		$this->songCount--;

	}
	
}

class SongListIterator
{
	protected $songList;
	protected $currentSong = 0;

	public function __construct(SongList $sl)
	{
		$this->songList = $sl;
	}

	public function getCurrentSong()
	{
		if( $this->currentSong > -1)
		{
			return $this->songList->getSong( $this->currentSong );
		} else
		{
			return NULL;
		}
	}

	public function getNextSong()
	{
		if( $this->hasNextSong() )
		{
			return $this->songList->getSong( ++$this->currentSong );
		} else
		{
			return NULL;
		}

	}

	public function hasNextSong()
	{
		if( $this->songList->getSongCount() > $this->currentSong )
		{
			return TRUE;
		} else
		{
			return FALSE;
		}
	}

}

class SongListReverseIterator extends SongListIterator
{
	public function __construct(SongList $sl)
	{
		$this->songList = $sl;
	}

	public function getNextSong()
	{ 
		if( $this->hasNextSong() )
		{
			return $this->songList->getSong(--$this->currentSong);
		} else
		{
			return NULL;
		}
	}

	public function hasNextSong()
	{
		if( $this->currentSong > 0 )
		{
			return TRUE;
		} else
		{
			return FALSE;
		}
	}
}

$listOfSongs     = new SongList();
$iterator        = new SongListIterator($listOfSongs);
$reverseIterator = new SongListReverseIterator($listOfSongs);

$listOfSongs->addSong( new Song('Stand by You',         'Rachel Platten', 'Even if we can\'t find heaven I\'ll walk through hell with you.' ));
$listOfSongs->addSong( new Song('All You Need Is Love', 'The Beatles',    'Love is all you need.'                                           ));
$listOfSongs->addSong( new Song('Closing Time',         'Semisonic',      'Every new beginning comes from some other beginning\'s end.'     ));

echo 'First Song: ' . $iterator->getNextSong()->getTitle() . "\n"; //Song 0

$adapter = new SongAdapter( $iterator->getNextSong() ); //Song 1
echo 'Second Song: ' . $adapter->getTitleComposer() . "\n";

echo 'Is there another song?  ';
if( $iterator->hasNextSong() )
{
	echo 'YES' . "\n";
} else
{
	echo 'NO' . "\n";
}

echo 'Current Song Quote: ';

$decorator       = new SongQuoteDecorator(  $iterator->getCurrentSong() );
$formatDecorator = new SongQuoteFormattedDecorator( $decorator );
$formatDecorator->formatQuote();
echo $decorator->showQuote() . "\n";

?>