<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

// $Archive: /homepages/masticscum/include/dir.php $
// $Author: Hannesd $
// $Date: 23.02.04 19:00 $
// $Revision: 23 $

/** Class for reading a directory structure.
aFiles contains multiple aFile entries
aFile:   Path        => relative path eg. ../xx/yy/
         File        => filename eg. filename (without extension)
         Extension   => ext
         IsDirectory => true/false
         FullName    => Path . File . '.' . Extension
         FileName    => File . '.' . Extension

Notes
Filenames with multiple Extensions: only the last extensions is saved as extensions
eg: aaa.bbb.ccc results in File=aaa.bbb and Extension=ccc
Filenames are stored in the same case as the are stored in the filesystem
sFilter is only applied to files.
*/

Class CDir
{
    var $aFiles;
	var $fVerbose;
	var $fCasesensitiv = true;
	var $fLowercase = false;

    /** <b>Constructor</b><br>
    	@param fVerbose = false display trace information
    */
    Function CDir( $fVerbose = false )
    {
	    $this->fVerbose = $fVerbose;
		$this->Init();
    }

    /** Initialize Class
    */
    Function Init()
    {
        unset( $this->aFiles );
        $this->aFiles = array();
    }

	/** Output messages to screen with echo
		@param sText
	*/
	Function Log( $sText )
	{
	    if ( $this->fVerbose )
	    {
	        echo $sText;
	        flush();
        }
	}

    /** reads directories and filenames
    	@param $sPath string path eg. '../xx/yy/' (please notice the last '/')
    	@param $sInclude string regular expression for filtering directories and filenames
    	@param $fRecursive bool read subdirectories as well
    	@param $fFiles bool include files
    	@param $fDirectory bool include directories
    	@param $sRoot string prepend root directory string (good for converting filesystem paths to urls)
    	@param $sExclude string regular expression for excluding files and directories
    */
    Function Read( $sPath, $sInclude = '', $fRecursive = false, $fFiles = true, $fDirectories = true, $sRoot = '', $sExclude = '' )
    {
        $this->Log( "Path: $sPath<br>\n" );
        $this->Log( "Include: $sInclude<br>\n" );
        $this->Log( "Recursive: $fRecursive<br>\n" );
        $this->Log( "Files: $fFiles<br>\n" );
        $this->Log( "Directories: $fDirectories<br>\n" );
        $this->Log( "Root: $sRoot<br>\n" );
        $this->Log( "Exclude: $sExclude<br>\n" );

        $aFiles = array();
		$oHandle = @opendir( $sPath );
        while ( ( $sFilename = @readdir( $oHandle ) ) !== false )
        {
			if ( $sFilename == '.' || $sFilename == '..' )
                continue;
            $aFiles[] = $sFilename;
        }
        @closedir( $oHandle );

        foreach( $aFiles as $sFilename )
        {
			$sFullname = $sRoot . $sFilename;
            $fInsert = true;
            $fIsDirectory = is_dir( $sPath . $sFilename );

            $fExclude = false;
			if ( !empty( $sExclude ) )
			{
			    if ( $this->GetCasesensitiv() )
			        $fExclude = ereg( $sExclude, $sFullname );
			    else
			        $fExclude = eregi( $sExclude, $sFullname );
                if ( $fExclude )
                {
					$this->Log( "Excluded: $sFullname<br>\n" );
					$fInsert = false;
                }
            }

            $fInclude = true;
			if ( !empty( $sInclude ) && !$fIsDirectory )
            {
			    if ( $this->GetCasesensitiv() )
			        $fInclude = ereg( $sInclude, $sFullname );
			    else
			        $fInclude = eregi( $sInclude, $sFullname );
                if ( !$fInclude )
                {
					$this->Log( "Not Included: $sFullname<br>\n" );
                    $fInsert = false;
                }
            }

            if ( !$fFiles && !$fIsDirectory )
                $fInsert = false;
            if ( !$fDirectories && $fIsDirectory )
                $fInsert = false;


            if ( $fInsert )
            {
				$this->Log( "Ok: $sFullname<br>\n" );

				$i = strrpos( $sFilename, '.' ) + 1;
                if ( substr( $sFilename, $i - 1, 1 ) == '.' )
                {
                    $sFile = substr( $sFilename, 0, $i - 1 );
                    $sExtension = substr( $sFilename, $i );
                }
                else
                {
                    $sFile = $sFilename;
                    $sExtension = '';
                }

                if ( $this->GetLowercase() )
                {
                    $sFile = strtolower( $sFile );
                    $sExtension = strtolower( $sExtension );
                }

                $aFile = array
                    (
                        'Path' => $sRoot,
                        'File' => $sFile,
                        'Extension' => $sExtension,
                        'Filename' => $sFilename,
                        'Fullname' => $sRoot . $sFilename,
                        'IsDirectory' => $fIsDirectory
                    );

                // Insert current file into aFiles array
                $this->aFiles[] = $aFile;
            }

            // Recursion?
            if ( $fRecursive && $fIsDirectory && !$fExclude )
            {
                $this->Log( "Rekursion: $sPath$sFilename/<br>\n" );
                $this->Read( $sPath . $sFilename . '/', $sInclude, $fRecursive, $fFiles, $fDirectories, $sRoot . $sFilename . '/', $sExclude );
            }
        }
    }
    
    /** Returns number of files/directories found
        return int
    */
    Function Count()
    {
        return( count( $this->aFiles ) );
    }
    
    /** Sorts array of found items
        param $sKey Key to sort by: File, Extension, Filename, Fullname
        param $fAscending = true
    */
    Function Sort( $sKey, $fAscending )
    {
        foreach( $this->aFiles as $aFile )
            $aSort[] = $aFile[ $sKey ];
        
        if ( $fAscending )
            @array_multisort( $aSort, $this->aFiles );
        else
            @array_multisort( $aSort, SORT_DESC, $this->aFiles );
    }

    /** outputs everything found (good for debugging)
    */
    Function Output()
    {
        echo 'Number of Items found: ' . $this->Count() . "<br>\n";
        echo "<hr>\n";
        foreach( $this->aFiles as $aFile )
            $this->OutputFile( $aFile );
    }

    /** outputs everything of a file entry (good for debugging)
    	@param aFile File entry
    */
    Function OutputFile( $aFile )
    {
        printf( "Path: %s<br>\n", $this->GetPath( $aFile ) );
        printf( "File: %s<br>\n", $this->GetFile( $aFile ) );
        printf( "Extension: %s<br>\n", $this->GetExtension( $aFile ) );
        printf( "IsDirectory: %s<br>\n", $this->GetIsDirectory( $aFile ) ? 'true' : 'false' );
        printf( "IsFile: %s<br>\n", $this->GetIsFile( $aFile ) ? 'true' : 'false' );
        printf( "Filename: %s<br>\n", $this->Filename( $aFile ) );
        printf( "Directoryname: %s<br>\n", $this->Directoryname( $aFile ) );
        printf( "Fullname: %s<br>\n", $this->Fullname( $aFile ) );
        echo "<hr>\n";
    }

    /** returns the path of a file (or directory)
    	@param aFile File entry
    	@return string
    */
    Function GetPath( $aFile )
    {
        return( $aFile[ 'Path' ] );
    }

    /** returns the filename without the extension of a file (or directory)
    	@param aFile File entry
    	@return string
    */
    Function GetFile( $aFile )
    {
        return( $aFile[ 'File' ] );
    }

    /** returns the extension of a file (or directory)
    	@param aFile File entry
    	@return string
    */
    Function GetExtension( $aFile )
    {
        return( $aFile[ 'Extension' ] );
    }

    /** returns true, if entry is a directory
    	@param aFile File entry
    	@return bool
    */
    Function GetIsDirectory( $aFile )
    {
        return( $aFile[ 'IsDirectory' ] );
    }

    /** returns true, if entry is a file
    	@param aFile File entry
    	@return bool
    */
    Function GetIsFile( $aFile )
    {
        return( !$this->GetIsDirectory( $aFile ) );
    }

    /** Returns Filename or Directory name (including ending '/')
    	@param aFile File entry
    	@return string
    */
    Function Filename( $aFile )
    {
        if ( $this->GetIsDirectory( $aFile ) )
            return( $aFile[ 'Filename' ] . '/' );
        else
            return( $aFile[ 'Filename' ] );
    }

    /** Directoryname returns the same as Filename, but without a ending '/' for Directories.
    	@param aFile File entry
    	@return string
    */
    Function Directoryname( $aFile )
    {
        return( $aFile[ 'Filename' ] );
    }

    /** Returns Fullname (path and filename)
    	@param aFile File entry
    	@return string
    */
    Function Fullname( $aFile )
    {
        if ( $this->GetIsDirectory( $aFile ) )
            return( $aFile[ 'Fullname' ] . '/' );
        else
            return( $aFile[ 'Fullname' ] );
    }

    /** Returns an array of fullnames (that is path and filename)
        return array of strings
    */
    Function Fullnames()
    {
        reset( $this->aFiles );
        foreach( $this->aFiles as $sKey => $aFile )
        	$aFiles[ $this->Fullname( $aFile ) ] = $this->FullName( $aFile );

        return( $aFiles );
    }

    /** Returns an array of filenames (that is filename with extension, but without path)
        return array of strings
    */
    Function Filenames()
    {
        reset( $this->aFiles );
        foreach( $this->aFiles as $sKey => $aFile )
        	$aFiles[ $this->Filename( $aFile ) ] = $this->Filename( $aFile );

        return( $aFiles );
    }

    /** Are filters casesensitiv?
    */
    Function SetCasesensitiv( $fValue )
    {
        $this->fCasesensitiv = $fValue;
    }
    Function GetCasesensitiv()
    {
        return( $this->fCasesensitiv );
    }

    /** Convert found file/directorynames into lowercase?
    */
    Function SetLowercase( $fValue )
    {
        $this->fLowercase = $fValue;
    }
    Function GetLowercase()
    {
        return( $this->fLowercase );
    }
}

?>
