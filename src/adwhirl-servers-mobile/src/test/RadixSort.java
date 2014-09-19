package test;

import java.lang.reflect.Array;
import java.util.Arrays;
import java.util.LinkedList;
import java.util.ListIterator;
import java.util.Scanner;

public class RadixSort {

	public static void main (String[] args){
		int size;
		int data[] = {0};
		
		Scanner keyboard = new Scanner(System.in);
		System.out.print("please input length of array");
		size = keyboard.nextInt();
		LinkedList<Integer> list = new LinkedList<Integer>();
		
		data= new int[size];
		int buf;
		for(int index = 0;index < size; index++){
			System.out.print("please input " + (index+1)  + "number");
			buf = keyboard.nextInt();
			data[index] = buf;
			list.add(buf);
			System.out.println();
		}
			
		System.out.print(Arrays.toString(data));
	//	RadixSort.radix(data,size);
		radix_yusheng(data,3);
		System.out.print("after sort by array type");
		System.out.print(Arrays.toString(data));
		
		System.out.print("after sort by list type");
		
			
		radix_list_yusheng(list,3);
		
		show_list(list);
		

	
		}
	
	
	
	public static void  show_list(LinkedList<Integer> list){
		
		  ListIterator listlit = list.listIterator();
		  
		  System.out.print(" [ ");
		  
		  while(listlit.hasNext()){
			  
			  
			  System.out.print(listlit.next() + ",");
			  			  
		  }
		  
		  System.out.print(" ] ");
		  
				
		
	}
	
	public static void radix(int data[],int size){
		int i,j,k,n,m;
		
		for(n=1;n<=100;n=n*10){
			int suf[][] = new int[data.length][100];
			for(n=1;n<=100;n=n*10){
				for(i=0;i<size;i++){
					m=(data[i]/n)%10;
					data[i] = suf[m][i];
					}
				k=0;
				for(i=0;i<10;i++){
					for(j=0;i<size;i++){
						if(suf[i][j] != 0){
							data[k]=suf[i][j];
							k++;
							}
						}
					}
				}
			}
		System.out.println(n);
		}
	
/*
 *  data[] : input data 
 *  number size : the max length of digit of input data set;
 * 
 */
	
	public static void radix_yusheng(int data[],int number_size){
		
		int decade_len =10;
		int data_len = data.length;
		int [][] bins  = new int[decade_len][data_len];// tag bin with 0-9 number
		 int[] order = new int[decade_len]; // recode how many digit is in each bin 
		int j=0,i=0,shift=1,digit_x , num;
		int lsd = 1;
		for(lsd = 1 ;lsd <= number_size ;lsd++){
			
			for(i=0;i<data_len;i++){
				num = data[i];
				digit_x =(num/shift)%10; // get the last significant digit 
				bins[digit_x][order[digit_x]]= num;
				order[digit_x]++;	  
			}
										
			int data_count=0;
			
			//81-90 : merge bins together
			for(i=0;i<decade_len;i++){
				
				for(j=0;j<order[i];j++){
					data[data_count]=bins[i][j];
					bins[i][j]=0;
					data_count++;
				}
				order[i] = 0;
				
			}
			shift=shift*10;
			
		}
		
	
		
	}
	
	
	
public static void radix_list_yusheng(LinkedList<Integer> data,int number_size){
		
		int decade_len =10;
		int data_len = data.size();
		int [][] bins  = new int[decade_len][data_len];// tag bin with 0-9 number
		int[] order = new int[decade_len]; // recode how many digit is in each bin 
		int j=0,i=0,shift=1,digit_x , num;
		int lsd = 1;
		for(lsd = 1 ;lsd <= number_size ;lsd++){
			
			for(i=0;i<data_len;i++){
				num = data.get(i);
				digit_x =(num/shift)%10; // get the last significant digit 
				bins[digit_x][order[digit_x]]= num;
				order[digit_x]++;	  
			}
										
			int data_count=0;
			
			//81-90 : merge bins together
			for(i=0;i<decade_len;i++){
				
				for(j=0;j<order[i];j++){
					data.set(data_count,bins[i][j]);
					bins[i][j]=0;
					data_count++;
				}
				order[i] = 0;
				
			}
			shift=shift*10;
			
		}
		
	
		
	}

	}

