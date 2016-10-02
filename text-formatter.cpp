#include <iostream>
#include <fstream>
#include <string>
#include <queue>
using namespace std;

int queueCheck(queue<string> wordz);


int main(int argc, char *argv[])
{
	
	ifstream myfile ("blah.txt");
	int begin= 0;
	int end= 0;
	short unsigned curLine= 1;
	string line;
	queue <string> words;
	
	//load all words into array of strings
	while(getline(myfile,line)){
		cout << "Current line: " << curLine << endl;
		
		if(line.substr(0,3) == ".ll"){
			words.push("LL");
		}else{ //if the line is valid

		//TODO else{ check if ignore }

		cout << line.length() << endl;

		for(int unsigned i=0; i<line.length(); i++){
			if(line[i]!=' '){//if we are on a char that is not a space
				if(!end){ //if end=0=false then we are not on a word; this is a new word
					begin= i;
				}
				end++;
				if(i==(line.length()-1)){ //if on last char of line 
					words.push(line.substr(begin,end));
					//cout << words.back() << endl;
					end= 0;
				}
			} 
			else{ //if we hit a space char
				if(end!=0){ //if word size !=0 then we finished a word, add to queue
					words.push(line.substr(begin,end));
					//cout << words.back() << endl;
					end= 0;
				} //else: we haven't even hit a word yet keep going
			}
			/*
			cout << "b = " << begin << endl;
			cout << "e = " << end << endl;
			cout << "i = " << i << endl << endl;
			*/
		}//for loop end
		}//valid line else end
		curLine++;
	}//while end

	myfile.close();

	queue<string> product = makelines(words);

	//queueCheck(words);

		
}//main end

queue<string> makelines(queue<string> ws){
	//const short unsigned MAX_LINE_LENGTH = 120;
	//const short unsigned MIN_LINE_LEGNTH = 10;
	short unsigned set_len = 60;
	
	string line ("");
	short unsigned spaces[];
	short unsigned spc = 0;
	
	while(ws.size()!=0){//while queue of words is not empty
		if(ws.front().length() + line.length() + 1 < set_len){
			line+= ws.front() + " "; 
			ws.pop();
			spaces[spc++]=line.length() - 1;
		}else{
			if(ws.front().length() + line.length() < set_len){
				line+= ws.front();

			}else{ //Add in spaces
				line= line.substr(0, line.length()-1); //get rid of trailing space from previous iteration
				short unsigned templength = line.length();

				for(short unsigned i=0; i < (set_len - templength); i++){
					line.insert(line.begin()+spaces[i%(sizeof(spaces) / sizeof(short))],' ');
				}
			}
		}
	}				
}

int queueCheck(queue<string> wordz){
	int unsigned sooze = wordz.size();
	
	for(int unsigned i=0; i<sooze; i++){
		cout << "\"" << wordz.front() << "\"" << endl;
		wordz.pop();
	}
	return 0;
}
/*
int command_ll(int n){
}
*/
