<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-01 at 14:34:18.
 */
class JGithubPackageRepositoriesDownloadsTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var    JRegistry  Options for the GitHub object.
	 * @since  11.4
	 */
	protected $options;

	/**
	 * @var    JGithubHttp  Mock client object.
	 * @since  11.4
	 */
	protected $client;

	/**
	 * @var    JHttpResponse  Mock response object.
	 * @since  12.3
	 */
	protected $response;

	/**
     * @var JGithubPackageRepositoriesDownloads
     */
    protected $object;

	/**
	 * @var    string  Sample JSON string.
	 * @since  12.3
	 */
	protected $sampleString = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

	/**
	 * @var    string  Sample JSON error message.
	 * @since  12.3
	 */
	protected $errorString = '{"message": "Generic Error"}';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @since   ¿
	 *
	 * @return  void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->options  = new JRegistry;
		$this->client   = $this->getMock('JGithubHttp', array('get', 'post', 'delete', 'patch', 'put'));
		$this->response = $this->getMock('JHttpResponse');

		$this->object = new JGithubPackageRepositoriesDownloads($this->options, $this->client);
	}

    /**
     * @covers JGithubPackageRepositoriesDownloads::getList
     * @todo   Implement testGetList().
     */
    public function testGetList()
    {
	    $this->response->code = 200;
	    $this->response->body = $this->sampleString;

	    $this->client->expects($this->once())
		    ->method('get')
		    ->with('/repos/joomla/joomla-platform/downloads')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->getList('joomla', 'joomla-platform'),
		    $this->equalTo(json_decode($this->sampleString))
	    );
    }

    /**
     * @covers JGithubPackageRepositoriesDownloads::get
     * @todo   Implement testGet().
     */
    public function testGet()
    {
	    $this->response->code = 200;
	    $this->response->body = $this->sampleString;

	    $this->client->expects($this->once())
		    ->method('get')
		    ->with('/repos/joomla/joomla-platform/downloads/123abc')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->get('joomla', 'joomla-platform', '123abc'),
		    $this->equalTo(json_decode($this->sampleString))
	    );
    }

    /**
     * @covers JGithubPackageRepositoriesDownloads::create
     * @todo   Implement testCreate().
     */
    public function testCreate()
    {
	    $this->response->code = 201;
	    $this->response->body = $this->sampleString;

	    $this->client->expects($this->once())
		    ->method('post')
		    ->with('/repos/joomla/joomla-platform/downloads')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->create('joomla', 'joomla-platform', 'aaa.zip', 1234, 'Description', 'content_type'),
		    $this->equalTo(json_decode($this->sampleString))
	    );
    }

    /**
     * @covers JGithubPackageRepositoriesDownloads::upload
     * @todo   Implement testUpload().
     */
    public function testUpload()
    {
	    $this->response->code = 201;
	    $this->response->body = true;

	    $this->client->expects($this->once())
		    ->method('post')
		    ->with('https://github.s3.amazonaws.com/')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->upload('joomla', 'joomla-platform', 123, 'a/b/aaa.zip', 'acl', 201, 'aaa.zip', '123abc', '123abc', '123abc','content_type', '@aaa.zip'),
		    $this->equalTo($this->response->body)
	    );
    }

    /**
     * @covers JGithubPackageRepositoriesDownloads::delete
     * @todo   Implement testDelete().
     */
    public function testDelete()
    {
	    $this->response->code = 204;
	    $this->response->body = $this->sampleString;

	    $this->client->expects($this->once())
		    ->method('delete')
		    ->with('/repos/joomla/joomla-platform/downloads/123')
		    ->will($this->returnValue($this->response));

	    $this->assertThat(
		    $this->object->delete('joomla', 'joomla-platform', 123),
		    $this->equalTo(json_decode($this->sampleString))
	    );
    }
}
