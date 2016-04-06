<?php
/**
 * FTP Class
 *
 * @author David Carr - dave@daveismyname.com
 * @version 1.0
 * @date June 27, 2014
 * @date updated 2，12, 2016  by Nickelhuang nickelyellow@gmail.com
 */

namespace Helpers;

/**
 * Interact with remote FTP Server.
 */
class Ftp
{
    private $_MY_DIRECTORY_SEPARATOR;

    /**
     * Hold the FTP connection.
     *
     * @var integer
     */
    private $conn;

    /**
     * Holds the path relative to the root of the server.
     *
     * @var string
     */
    private $basePath;

    /**
     * Open a FTP connection.
     *
     * @param string $host the server address
     * @param string $user username
     * @param string $pass password
     * @param string $base the public folder usually public_html or httpdocs
     */
    public function __construct($host, $user, $pass, $base, $dir_separator = DIRECTORY_SEPARATOR)
    {
        $this->connect($host, $user, $pass, $base);
    }

    /**
     * Connect to ftp ，open connection.
     */
    public function connect($host, $user, $pass, $base, $dir_separator = DIRECTORY_SEPARATOR)
    {
        $this->_MY_DIRECTORY_SEPARATOR = $dir_separator;

        //set the basepath
        $this->_basePath = $base;

        //open a connection
        $this->_conn = ftp_connect($host);

        //login to server
        ftp_login($this->_conn, $user, $pass);

        // 打开被动模拟
        ftp_pasv($this->_conn, true); 
    }

    /**
     * Close the connection.
     */
    public function close()
    {
        ftp_close($this->_conn);
    }


    /**
     * Create a directory on the remote FTP server.
     *
     * @param  string $dir   name of the directory to create
     */
    function makeDirectory($dir){

        $fullPath = $this->_basePath . $_MY_DIRECTORY_SEPARATOR . $dir

        // if directory already exists or can be immediately created return true
        if ($this->_isDir($fullPath) || @ftp_mkdir($this->_conn, $fullPath)) return true;

        // if it is a file, otherwise recursively try to make the parent directory
        if (!$this->makeDirectory($this->_conn, dirname($fullPath))) return false;

        // final step to create the directory
        return ftp_mkdir($this->_conn, $fullPath);
    }
      
    /**
     * 判断是否为已存在的目录
     *
     */  
    private function _isDir($dir){
        // get current directory
        $originDir = ftp_pwd($this->_conn);
        
        // test if you can change directory to $dir
        // suppress errors in case $dir is not a file or not a directory
        if ( @ftp_chdir( $this->_conn, $dir ) ) {
            // If it is a directory, then change the directory back to the original directory
            ftp_chdir( $this->_conn, $originDir );
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete directory from FTP server.
     *
     * @param  string $dir foldr to delete
     */
    public function deleteDirectory($dir)
    {
        ftp_rmdir($this->_conn, $this->_basePath.$dir);
    }

    /**
     * Set folder permission.
     *
     * @param  string $folder folder name
     * @param  integer $permission permission value
     *
     * @return string              success message
     */
    public function folderPermission($folder, $permission)
    {
        if (ftp_chmod($this->_conn, $permission, $folder) !== false) {
            return $permission;
        } esle {
            return fasle;
        }
    }

    /**
     * Upload file to FTP server.
     *
     * @param  string $remoteFile path and filename for remote file
     * @param  string $localFile  local path to file
     *
     * @return string             message
     */
    public function uploadFile($remoteFile, $localFile)
    {
        return ftp_put($this->_conn, $this->_basePath . $_MY_DIRECTORY_SEPARATOR . $remoteFile, $localFile, FTP_ASCII);
    }

    /**
     * 方法：移动文件
     * @path -- 原路径
     * @newpath -- 新路径
     * @type -- 若目标目录不存在则新建
     */
    function moveFile($path,$newpath,$type=true)
    {
        if($type) $this->makeDirectory($newpath);
        
        if(!ftp_rename($this->_conn_id,$path,$newpath)) echo "文件移动失败，请检查权限及原路径是否正确！";
    }

    /**
     * Delete remove dir.
     *
     * @param  string $file path and filename
     */
    public function deleteDir($dir)
    {
        ftp_delete($this->_conn, $this->_basePath.$file);
    }

    /**
     * Delete remove file.
     *
     * @param  string $file path and filename
     */
    public function deleteFile($file)
    {
        ftp_delete($this->_conn, $this->_basePath.$file);
    }
}
