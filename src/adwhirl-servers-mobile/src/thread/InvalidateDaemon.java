/*
  Copyright 2009-2010 AdMob, Inc.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
 */

package thread;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.TimeZone;

import mysql.Instance;
import mysql.MySQL;

import org.apache.log4j.Logger;

import util.AdWhirlUtil;


public class InvalidateDaemon implements Runnable {
	static Logger log = Logger.getLogger("InvalidateDaemon");
/**adwhirl 
 * 
	private static AmazonSimpleDB sdb;

*/
	private static MySQL mySQL;
	public void run() {
		log.info("InvalidateDaemon started");
/**adwhirl
		sdb = AdWhirlUtil.getSDB();
*/
		mySQL = MySQL.getMySQL();
		//We're a makeshift daemon, let's loop forever
		while(true) {

			Date date = new Date();
			Calendar c = new GregorianCalendar();
			c.setTime(date);
			c.add(Calendar.SECOND, -60);
			date = c.getTime();
		    SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd, HH:mm:ss");
		    sdf.setTimeZone(TimeZone.getTimeZone("GMT"));
		    String dateTime = sdf.format(date);
		    
		    log.info("Cutoff is: " + dateTime);

		    invalidateApps(dateTime);
		    invalidateCustoms(dateTime);

			try {
				Thread.sleep(30000);
			} catch (InterruptedException e) {
				log.error("Unable to sleep... continuing");
			}
		}
	}

	private void invalidateApps(String dateTime) {
/**
		String invalidsNextToken = null;
		do {
			SelectRequest invalidsRequest = new SelectRequest("select `itemName()` from `" + AdWhirlUtil.DOMAIN_APPS_INVALID + "` where dateTime < '" + dateTime + "'");
			invalidsRequest.setNextToken(invalidsNextToken);
			try {
			    SelectResult invalidsResult = sdb.select(invalidsRequest);
			    invalidsNextToken = invalidsResult.getNextToken();
			    List<Item> invalidsList = invalidsResult.getItems();
				    
				for(Item item : invalidsList) {
					String aid = item.getName();
					deleteInvalid(AdWhirlUtil.DOMAIN_APPS_INVALID, aid);
				}
			}
			catch(Exception e) {
				AdWhirlUtil.logException(e, log);

				// Eventually we'll get a 'stale request' error and need to start over.
				invalidsNextToken = null;
			}
		}
		while(invalidsNextToken != null);
*/
		
		Instance instance = mySQL.select("select id from " + AdWhirlUtil.DOMAIN_APPS_INVALID + " where dateTime < '" + dateTime + "'");
		ResultSet resultset = instance.getResuSet();
		try {
			while(resultset.next()){
				
				String aid = resultset.getString("id");
				deleteInvalid(AdWhirlUtil.DOMAIN_APPS_INVALID, aid);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		}

	private void invalidateCustoms(String dateTime) {

/**
		String invalidsNextToken = null;
		do {
			SelectRequest invalidsRequest = new SelectRequest("select `itemName()` from `" + AdWhirlUtil.DOMAIN_CUSTOMS_INVALID + "` where dateTime < '" + dateTime + "'");
			invalidsRequest.setNextToken(invalidsNextToken);
			try {
			    SelectResult invalidsResult = sdb.select(invalidsRequest);
			    invalidsNextToken = invalidsResult.getNextToken();
			    List<Item> invalidsList = invalidsResult.getItems();
				    
				for(Item item : invalidsList) {
					String aid = item.getName();
					deleteInvalid(AdWhirlUtil.DOMAIN_CUSTOMS_INVALID, aid);
				}
			}
			catch(Exception e) {
				AdWhirlUtil.logException(e, log);

				// Eventually we'll get a 'stale request' error and need to start over.
				invalidsNextToken = null;
			}
		}
		while(invalidsNextToken != null);
*/
		
		
		
		Instance instance = mySQL.select("select  id from " + AdWhirlUtil.DOMAIN_CUSTOMS_INVALID + " where dateTime < '" + dateTime + "'");
		ResultSet resultset = instance.getResuSet();
		try {
			while(resultset.next()){
				
				String aid = resultset.getString("id");
				deleteInvalid(AdWhirlUtil.DOMAIN_CUSTOMS_INVALID, aid);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
	}

	private void deleteInvalid(String domain, String id) {
			log.debug("Deleting invalid <" + domain + ", " + id + ">");
/**
			DeleteAttributesRequest deleteRequest = new DeleteAttributesRequest(domain, id);
			try {
				sdb.deleteAttributes(deleteRequest);
			} catch (Exception e) {
				AdWhirlUtil.logException(e, log);
				return;
			}
*/
			mySQL.delete(domain, " where id = '" + id + "' ");
		}
}
