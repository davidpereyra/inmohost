; inmohost.nsi
;
; Script de Instalación del sistema Inmohost V2.0
;
;--------------------------------

; Si no tenemos numero de version no arrancamos
!ifndef REVISION
	!error "REVISION no ha sido definido"
!endif

; Nombre del Instalador
Name "InmohostV2.0"

; Nombre del archivo del instalador
OutFile "c:\wamp\www\instaladores_sistema\inmohostV2.0\inmohostV2.0-setup-rev_${REVISION}.exe"

; Directorio de instalación
InstallDir "c:\wamp"

; Lenguaje de instalación
LoadLanguageFile "${NSISDIR}\Contrib\Language files\Spanish.nlf"
;--------------------------------

;Icono
Icon "C:\wamp\www\inmohostV2.0\interfaz\inmohost\images\inmohost.ico"
UninstallIcon "C:\wamp\www\inmohostV2.0\interfaz\inmohost\images\inmohost.ico"

; Paginas
Page directory
Page instfiles

UninstPage uninstConfirm
UninstPage instfiles
;--------------------------------

; Licencia
;LicenseData "c:\inst\wamp\contrato.doc"

; Defines para ejecutar el acceso directo al finalizar
    !define MUI_FINISHPAGE_NOAUTOCLOSE
    !define MUI_FINISHPAGE_RUN
    !define MUI_FINISHPAGE_RUN_NOTCHECKED
    !define MUI_FINISHPAGE_RUN_TEXT "Terminar Instalación"
    !define MUI_FINISHPAGE_RUN_FUNCTION "terminarInst"
	
; Componentes a Instalar
Section "-InmohostV2.0 (required)"

  SectionIn RO
 
  ; Escribimos en el directorio de instalación
  SetOutPath $INSTDIR
  
  ; Archivos a copiar
  File /r "c:\inst\wamp\Apache2"
  File /r "c:\inst\wamp\dumps*"
  File /r "c:\inst\wamp\inst"
  File /r "c:\inst\wamp\lang"
  File /r "c:\inst\wamp\logs"
  File /r "c:\wamp\www\inmohost"
  File /r "c:\inst\wamp\mysql"
  File /r "c:\inst\wamp\php"
  ;File /r "c:\inst\wamp\phpmyadmin"
  File /r "c:\inst\wamp\scripts"
  ;File /r "c:\inst\wamp\sqlitemanager"
  File /r "c:\inst\wamp\tmp"
  File /x *.nsi "c:\inst\wamp\*.*"

  SetOutPath "$INSTDIR\www\inmohostV2.0"
  File "c:\wamp\www\inmohostV2.0\*.*"
  File /r "c:\wamp\www\inmohostV2.0\.svn"
  File /r "c:\wamp\www\inmohostV2.0\_notes"
  File /r "c:\wamp\www\inmohostV2.0\interfaz"
  File /r "c:\wamp\www\inmohostV2.0\system"
  SetOutPath "$INSTDIR\www\inmohostV2.0\backups"
  SetOutPath "$INSTDIR\www\inmohostV2.0\fotos"
  File "c:\wamp\www\inmohostV2.0\fotos\0-0-0.jpg"
  SetOutPath "$INSTDIR\www\svn"
  File /r "c:\wamp\www\svn\bin"
  File /r "c:\wamp\www\svn\iconv"
  File /r "c:\wamp\www\svn\share"
    
  ; Write the installation path into the registry
  WriteRegStr HKLM SOFTWARE\InmohostV2.0 "Install_Dir" "$INSTDIR"
  
  ; Write the uninstall keys for Windows
  WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\InmohostV2.0" "DisplayName" "InmohostV2.0"
  WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\InmohostV2.0" "UninstallString" '"$INSTDIR\uninstall.exe"'
  WriteRegDWORD HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\InmohostV2.0" "NoModify" 1
  WriteRegDWORD HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\InmohostV2.0" "NoRepair" 1
  WriteUninstaller "uninstall.exe"
  SetOutPath $INSTDIR
  ExecWait "$INSTDIR\install_services_auto.bat"
  ExecShell "" "http://localhost/inmohostV2.0/configura_bd.php"
SectionEnd

; Optional section (can be disabled by the user)
Section "Start Menu Shortcuts"

  CreateDirectory "$SMPROGRAMS\InmohostV2.0"
  CreateShortCut "$SMPROGRAMS\InmohostV2.0\Uninstall.lnk" "$INSTDIR\uninstall.exe" "" "$INSTDIR\uninstall.exe" 0
  CreateShortCut "$SMPROGRAMS\InmohostV2.0\InmohostV2.0.lnk" "http://localhost/inmohostV2.0/" "" "$INSTDIR\www\inmohostV2.0\interfaz\inmohost\images\inmohost.ico" 0
  CreateShortCut "$DESKTOP\InmohostV2.0.lnk" "http://localhost/inmohostV2.0" "" "$INSTDIR\www\inmohostV2.0\interfaz\inmohost\images\inmohost.ico" 0
SectionEnd
;--------------------------------
; Uninstaller

Section "Uninstall"
  ; Trabajamos sobre el directorio de instalación
  SetOutPath $INSTDIR
  
  ; Eliminar llaves del registro
  DeleteRegKey HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\InmohostV2.0"
  ;DeleteRegKey HKLM SOFTWARE\NSIS_Example2
	
  ExecWait "$INSTDIR\uninstall_services.bat"
  ; Eliminar archivos creados
  Delete $INSTDIR\*

  ; Eliminar Accesos Directos
  Delete "$SMPROGRAMS\InmohostV2.0\*.*"
  Delete "$DESKTOP\InmohostV2.0.lnk"
  ; Eliminar directorios creados
  RMDir "$SMPROGRAMS\InmohostV2.0"
  RMDir /r "$INSTDIR"


SectionEnd
